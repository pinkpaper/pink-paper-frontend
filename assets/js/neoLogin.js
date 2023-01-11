let neoline;
let neolineN3;

//
// ──────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: I N I T I A T E   N E O   D A T A : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────
//

async function initDapi() {
    const initCommonDapi = new Promise((resolve, reject) => {
        window.addEventListener('NEOLine.NEO.EVENT.READY', () => {
            neoline = new NEOLine.Init();
            if (neoline) {
                resolve(neoline);
            } else {
                reject('common dAPI method failed to load.');
            }
        });
    });
    const initN3Dapi = new Promise((resolve, reject) => {
        window.addEventListener('NEOLine.N3.EVENT.READY', () => {
            neolineN3 = new NEOLineN3.Init();
            if (neolineN3) {
                resolve(neolineN3);
            } else {
                reject('N3 dAPI method failed to load.');
            }
        });
    });
    await initCommonDapi.then(() => {
        console.log('The common dAPI method is loaded.');
        return initN3Dapi;
    }).then(() => {
        console.log('The N3 dAPI method is loaded.');
    }).catch((err) => {
        console.log(err);
    });
};
initDapi();

//
// ────────────────────────────────────────────────────── I ──────────
//   :::::: S I G N   I N : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────
//


function neoLogin() {
    neoline.getAccount().then(account => {
        const { address, label } = account;
        console.log('Provider address: ' + address);
        console.log('Provider account label (Optional): ' + label);
        neoLoginUser(address, label);
    }).catch((error) => {
        const { type, description, data } = error;
        switch (type) {
            case 'NO_PROVIDER':
                console.log('No provider available.');
                break;
            case 'CONNECTION_DENIED':
                console.log('The user rejected the request to connect with your dApp');
                break;
            case 'CHAIN_NOT_MATCH':
                console.log('The currently opened chain does not match the type of the call chain, please switch the chain.');
                break;
            default:
                // Not an expected error object.  Just write the error to the console.
                console.error(error);
                break;
        }
    });
};

//
// ────────────────────────────────────────────────────────────── I ──────────
//   :::::: S E N D   D O N A T E : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────
//


async function donateNeo(post_uuid_neo, MY_ADDRESS, USER_ADDRESS, value_neo) {
    await neoline.getNetworks()
        .then(result => {
            const {
                chainId,
                networks,
                defaultNetwork
            } = result;

            // console.log('chainId: ' + chainId);


            console.log('Networks: ' + networks);
            //     eg. ["MainNet", "TestNet", "N3TestNet"]

            console.log('Default network: ' + defaultNetwork);
            //     eg. "N3TestNet"
            if (chainId !== 3 && chainId) {
                alert('Please change you network Testnet to Mainnnet');
                return false;
            } else {
                neolineN3.send({
                    fromAddress: MY_ADDRESS,
                    toAddress: USER_ADDRESS,
                    asset: 'NEO',
                    amount: value_neo,
                    fee: '0.0001',
                    broadcastOverride: false
                })
                    .then(result => {
                        console.log('Send transaction success!');
                        console.log('Transaction ID: ' + result.txid);
                        const transactionHash = result.txid;
                        const currentChainId = 'neo';
                        $.ajax({
                            url: "php/uploadDonateNeo.php",
                            method: "POST",
                            dataType: "json",
                            data: {
                                post_uuid: post_uuid_neo,
                                from_address: MY_ADDRESS,
                                to_address: USER_ADDRESS,
                                eth_price: value_neo,
                                transation_hash: transactionHash,
                                current_chain_id: currentChainId
                            },
                            success: function (data) {
                                if (data.status == 201) {
                                    console.log(data.success);
                                    $('#transation_successfull_msg').css('display',
                                        'block');
                                    $('#transation_failed_msg').css('display', 'none');
                                    $("#transationLinkStyle").attr("href",
                                        `${data.transaction_url}`
                                    );
                                    $("#transationLink").text(data.transaction_hash);
                                    $('#neoDonateModal').modal('hide');
                                    $('#metamaskSuccessModal').modal('show');
                                } else if (data.status == 301) {
                                    $('#transation_successfull_msg').css('display', 'none');
                                    $('#transation_failed_msg').css('display', 'block');
                                    console.log(data.error);
                                } else { }
                            }
                        });
                    })
                    .catch((error) => {
                        const { type, description, data } = error;
                        switch (type) {
                            case 'NO_PROVIDER':
                                alert('No provider available.');
                                break;
                            case 'RPC_ERROR':
                                alert('There was an error when broadcasting this transaction to the network.');
                                break;
                            case 'MALFORMED_INPUT':
                                alert('The receiver address provided is not valid.');
                                break;
                            case 'CANCELED':
                                alert('The user has canceled this transaction.');
                                break;
                            case 'INSUFFICIENT_FUNDS':
                                alert('The user has insufficient funds to execute this transaction.');
                                break;
                            default:
                                //   Not an expected error object.  Just write the error to the console.
                                console.error(error);
                                break;
                        }
                    });
            }
        })
        .catch((error) => {
            const { type, description, data } = error;
            switch (type) {
                case 'NO_PROVIDER':
                    console.log('No provider available.');
                    break;
                case 'CONNECTION_DENIED':
                    console.log('The user rejected the request to connect with your dApp');
                    break;
                case 'CHAIN_NOT_MATCH':
                    console.log('The currently opened chain does not match the type of the call chain, please switch the chain.');
                    break;
                default:
                    // Not an expected error object.  Just write the error to the console.
                    console.error(error);
                    break;
            }
        });


};

function neoLoginUser(address, label) {
    $.ajax({
        url: "php/neo-login.php",
        method: "POST",
        dataType: "json",
        data: {
            address: address,
            label: label,
        },
        success: function (data) {
            if (data.status == 201) {
                console.log(data.success);
                window.location.href = "./register";
            } else if (data.status == 301) {
                console.log(data.error);
            } else { }
        }
    });
}