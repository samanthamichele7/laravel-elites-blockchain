import Web3 from "web3";
import contract from "truffle-contract";
import artifacts from "../build/contracts/Certificate.json";
const Certificate = contract(artifacts);

export default {
    data() {
        return {
            applicant: {
                githubId: null,
                certified: false,
                certifier: null
            },
            certifierAddress: null,
            contractAddress: null,
            loading: true
        };
    },

    created() {
        const web3 = this.initWeb3();
        Certificate.setProvider(web3.currentProvider);
        this.setAddresses(web3);
    },

    methods: {
        initWeb3() {
            if (typeof web3 !== "undefined") {
                console.warn(
                    "Using web3 detected from external source. If you find that your accounts don't appear or you have 0 Fluyd, ensure you've configured that source properly. If using MetaMask, see the following link. Feel free to delete this warning. :) http://truffleframework.com/tutorials/truffle-and-metamask"
                );
                // Use Mist/MetaMask's provider
                return new Web3(web3.currentProvider);
            }

            console.warn(
                "No web3 detected. Falling back to http://127.0.0.1:7545. You should remove this fallback when you deploy live, as it's inherently insecure. Consider switching to Metamask for development. More info here: http://truffleframework.com/tutorials/truffle-and-metamask"
            );

            // fallback - use your fallback strategy (local node / hosted node + in-dapp id mgmt / fail)
            return new Web3(
                new Web3.providers.HttpProvider("http://127.0.0.1:7545")
            );
        },

        setAddresses(web3) {
            web3.eth.getAccounts((err, accounts) => {
                if (err) {
                    console.warn(
                        "There was an error fetching your accounts. Do you have Metamask, Mist installed or an Ethereum node running? If not, you might want to look into that"
                    );

                    return;
                }

                if (accounts.length === 0) {
                    console.log(
                        "Couldn't get any accounts! Make sure your Ethereum client is configured correctly."
                    );

                    return;
                }

                this.certifierAddress = accounts[0];
                web3.eth.defaultAccount = this.certifierAddress;

                Certificate.deployed()
                    .then(instance => instance.address)
                    .then(address => {
                        this.contractAddress = address;
                    });
            });
        },

        getApplicant() {
            Certificate.at(this.contractAddress)
                .then(instance => instance.getApplicant(this.user.github_id))
                .then(result => {
                    console.log(result);

                    this.applicant = {
                        githubId: result[0].toString(),
                        certified: result[1],
                        certifier: result[2]
                    };

                    this.loading = false;
                });
        },

        certify() {
            Certificate.at(this.contractAddress)
                .then(instance =>
                    instance.certify(this.user.github_id, true, {
                        from: this.certifierAddress
                    })
                )
                .then(() => {
                    this.getApplicant();
                });
        }
    }
};
