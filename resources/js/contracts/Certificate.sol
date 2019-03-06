pragma solidity ^0.5.0;

contract Certificate {
    struct Applicant {
        uint githubId;
        bool certified;
        address certifier;
    }

    address public certifier;

    mapping(uint => Applicant) public applicants;

    constructor() public {
        certifier = msg.sender;
    }

    function certify(uint githubId, bool certified) public returns (uint) {
        require(
            !applicants[githubId].certified,
            "This person is already certified."
        );

        applicants[githubId] = Applicant({
            githubId: githubId,
            certified: certified,
            certifier: certifier
        });

        return githubId;
    }

    function getApplicant(uint githubId) public view returns(
    	uint,
    	bool,
        address
    ) {
        Applicant memory i = applicants[githubId];

        return (
            githubId,
            i.certified,
            i.certifier
        );
    }
}