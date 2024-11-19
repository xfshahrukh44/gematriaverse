<?php

function get_subscription () {
    $subscriptions = json_decode(file_get_contents(url('/subscriptions.json')))->subscriptions;

    $current_subscription_string = auth()->check() ? auth()->user()->plan : 'bronze';

    return $subscriptions->$current_subscription_string;
}

function can_access_feature ($key) {
    $subscription = get_subscription();

    $features = $subscription->features;

    return $features->$key && $features->$key !== false;
}

function get_feature ($key) {
    $subscription = get_subscription();

    $features = $subscription->features;

    return $features->$key;
}

function getDaysInMonth($monthName, $year) {
    $fullMonthName = date('F', strtotime($monthName . ' 1'));
    $date = \DateTime::createFromFormat('F Y', "$fullMonthName $year");

    if ($date) {
        return $date->format('t');
    } else {
        return 31;
    }
}
