<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Livewire'], function () {

    Route::group([
        'middleware' => ['auth'],
    ], function () {

        Route::get('/', Dashboard::class)->name('dashboard');

        Route::get('cards', Card\CardManager::class);
        Route::get('card/transaction-fiches', Card\TransactionFiches::class);

        Route::get('payrolls', CashItem\PayrollManager::class);
        Route::get('payroll/create', CashItem\Create::class);
        Route::get('cash-items', CashItem\CashItemManager::class);

        Route::get('items', Stock\ItemManager::class);
        Route::get('item/movements', Stock\StockMovements::class);

        Route::get('unit-sets', Stock\UnitSetManager::class);

        Route::get('bank/{bankId}/accounts', Bank\BankAccountManager::class);
        Route::get('bank/{bankAccountId}/credit-cards', Bank\BankCreditCardManager::class);
        Route::get('unit-set/{bankId}', Stock\UnitManager::class);

        Route::get('banks', Bank\BankManager::class);
        Route::group(['prefix' => 'bank', 'namespace' => 'Bank'], function () {
            Route::get('fiches', Fiche\Fiches::class);
            Route::get('movements', Movements::class);

            Route::get('fiche/create', Fiche\Create::class);
            Route::get('fiche/{bankFicheId}', Fiche\Show::class);
            Route::get('fiche/{bankFicheId}/edit', Fiche\Edit::class);
        });

        Route::group(['prefix' => 'invoice', 'namespace' => 'Invoice'], function () {
            Route::get('sales', Sales\Fiches::class);
            Route::get('sales/create', Sales\Create::class);
            Route::get('sales/{salesId}', Sales\Show::class);
            Route::get('sales/{salesId}/edit', Sales\Edit::class);

            Route::get('purchase', Purchase\Fiches::class);
            Route::get('purchase/create', Purchase\Create::class);
            Route::get('purchase/{purchaseId}', Purchase\Show::class);
            Route::get('purchase/{purchaseId}/edit', Purchase\Edit::class);
        });

        Route::get('vaults', Vault\VaultManager::class);
        Route::group(['prefix' => 'vault', 'namespace' => 'Vault'], function () {
            Route::get('fiche/create', Create::class);
            Route::get('fiche/{vaultFicheId}/edit', Edit::class);
            Route::get('fiches', Fiches::class);
            Route::get('movements', Movements::class);
        });

    });

});