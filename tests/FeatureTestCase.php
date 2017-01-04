<?php


use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
    /**
     * Feature test case
     */
{
    //using this trait insted of databasemigratoion to make tests faster
    use DatabaseTransactions;

}