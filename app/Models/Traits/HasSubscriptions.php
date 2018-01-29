<?php

namespace App\Models\Traits;


trait HasSubscriptions
{

    public function hasSubscription(){

        return $this->subscribed('main');

    }

    public function doesNotHaveSubscription(){

        return !$this->hasSubscription();

    }

    public function hasCancelled(){
        return optional($this->subscription('main'))->cancelled();
    }

    public function hasNotCancelled(){
       return !optional($this->subscription('main'))->cancelled();
    }
}
