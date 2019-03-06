# Laravel Elites

## Version 2 - now with Ethereum blockchain goodness!

This repo is built as a companion to Samantha Geitz's Laracon Online 2019 talk, "Laravel, the Blockchain, and You!" (Link coming soon!)

### Installation

You can install this app like a normal Laravel app (including seeding the questions/answers via `$ php artisan db:seed`), but you will need three additional pieces of software to enable the blockchain functionality:

[Truffle](https://truffleframework.com/truffle)

This is a development framework for Ethereum. You can install it globally with `$ npm install truffle -g`

[Ganache](https://truffleframework.com/ganache)

Ganache lets you quickly fire up a local Ethereum blockchain for testing purposes. It is available via desktop software for Windows/Mac/Linux or a CLI tool!

[MetaMask](https://metamask.io/)

MetaMask is a web wallet for Ethereum. You may have to add "127.0.0.1:7545" as a custom RPC if you are using the Truffle/Ganache defaults. (8545 is the MetaMask default port).

To set up Truffle in your project, copy `truffle-config.example.js` to `truffle-config.js`. You can run smart contract migrations (which are stored in `resources/js/contracts`) via `$ truffle migrate` in the command line.
