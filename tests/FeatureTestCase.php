<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
    /**
     * Feature test case
     */
{
    //using this trait insted of databasemigratoion to make tests faster
    use DatabaseTransactions;



    public function seeErrors(array $fields)
    {
        foreach ($fields as $name => $errors) {
            foreach ((array) $errors as $message) {
                $this->seeInElement(
                    "#field_{$name}.has-error .help-block", $message
                );
            }
        }
    }

}