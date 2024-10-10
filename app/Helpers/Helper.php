<?php

function get_subscription () {
    $subscriptions = json_decode(file_get_contents(url('/subscriptions.json')))->subscriptions;

    $current_subscription_string = auth()->check() ? auth()->user()->plan : 'guest';

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