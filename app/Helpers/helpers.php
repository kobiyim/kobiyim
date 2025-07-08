<?php

function salesTypes($type = null)
{
    $types = collect([
        '1' => 'Satış Faturası',
        '3' => 'Satış İade Faturası',
    ]);

    return ($type == null) ? $types : $types[$type];
}

function signOfSalesInvoice($type)
{
    $types = [
        '1' => '1',
        '3' => '0',
    ];

    return $types[$type];
}

function signOfBankFiche($type)
{
    $types = [
        '1' => '1',
        '2' => '0',
    ];

    return $types[$type];
}

function purchaseTypes($type = null)
{
    $types = collect([
        '2' => 'Satınalma Faturası',
        '4' => 'Satınalma İade Faturası',
    ]);

    return ($type == null) ? $types : $types[$type];
}

function signOfPurchaseInvoice($type)
{
    $types = [
        '2' => '0',
        '4' => '1',
    ];

    return $types[$type];
}

function bankFicheTypes($type = null)
{
    $types = collect([
        '1' => 'Gelen Havale',
        '2' => 'Gönderilen Havale',
    ]);

    return ($type == null) ? $types : $types[$type];
}

function bankTransactions($type = null)
{
    $types = [
        '1' => 'Gelen Havale',
        '2' => 'Gönderilen Havale',
    ];

    return ($type == null) ? $types : $types[$type];
}

function signOfBankTransaction($type)
{
    $types = [
        '1' => '1',
        '2' => '0',
    ];

    return $types[$type];
}

function cardTransactions($type = null)
{
    $types = [
        '1' => 'Alacak Dekontu',
        '2' => 'Borç Dekontu',
        '3' => 'Virman Fişi',
    ];

    return ($type == null) ? $types : $types[$type];
}

function signOfCardTransaction($type)
{
    $types = [
        '1' => '1',
        '2' => '0',
    ];

    return $types[$type];
}

function moneyFormat($amount)
{
    return number_format($amount, 2, ',', '.');
}
