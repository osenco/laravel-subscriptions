<?php

namespace Osen\Subscriptions\Facades;

use Illuminate\Support\Facades\Facade;

class Plan extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'plan';
    }

    function name(string $name) {
        return $this;
    }

    function description(string $description) {
        return $this;
    }

    function price(float $price) {
        return $this;
    }

    function currency(string $currency) {
        return $this;
    }

    function limitedTo(int $limitedTo) {
        return $this;
    }

    function notRenewable() {
        return $this;
    }

    function interval(string $interval) {
        return $this;
    }

    function trialDays(int $trialDays) {
        return $this;
    }

    function features(array $features) {
        return $this;
    }

    function save() {
        return $this;
    }

    function days(int $days) {
        return $this;
    }
    
    function daily() {
        return $this;
    }

    function forOnlyOneDay() {
        return $this;
    }

    function addDays(int $days) {
        return $this;
    }

    function weekly() {
        return $this;
    }

    function forOnlyOneWeek() {
        return $this;
    }

    function weeks(int $weeks) {
        return $this;
    }

    function biweekly() {
        return $this;
    }

    function monthly() {
        return $this;
    }

    function forOnlyOneMonth() {
        return $this;
    }

    function bimonthly() {
        return $this;
    }

    function quarterly() {
        return $this;
    }

    function months(int $months) {
        return $this;
    }

    function yearly() {
        return $this;
    }

    function biannually() {
        return $this;
    }

    function biennially() {
        return $this;
    }

    function triennially() {
        return $this;
    }

    function years(int $years) {
        return $this;
    }

    function lock() {
        return $this;
    }

    function unlock() {
        return $this;
    }
    
    function hide() {
        return $this;
    }

    function show() {
        return $this;
    }
}