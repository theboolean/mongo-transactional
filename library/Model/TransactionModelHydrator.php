<?php
/**
 * MongoDB Transaction
 *
 * @link        https://github.com/matryoshka-model/mongo-transaction
 * @copyright   Copyright (c) 2015, Ripa Club
 * @license     http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */
namespace Matryoshka\MongoTransaction\Model;


use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Matryoshka\Model\Hydrator\Strategy\SetTypeStrategy;
use Matryoshka\MongoTransaction\Error\ErrorObject;
use Matryoshka\Model\Wrapper\Mongo\Hydrator\ClassMethods as MatryoshkaMongoWrapperClassMethods;


class TransactionModelHydrator extends MatryoshkaMongoWrapperClassMethods
{
    public function __construct()
    {
        parent::__construct(true);

        // Strategy
        $this->addStrategy('state', new SetTypeStrategy('string', 'string'));
        $this->addStrategy('type', new SetTypeStrategy('string', 'string'));
        $this->addStrategy('recovery', new SetTypeStrategy('bool', 'bool'));
        $this->addStrategy('error', new HasOneStrategy(new ErrorObject()));
    }
}
