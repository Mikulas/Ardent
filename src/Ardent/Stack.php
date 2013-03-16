<?php

namespace Ardent;

interface Stack extends \IteratorAggregate, Collection {

    /**
     * @param mixed $object
     *
     * @throws TypeException if $object is not the correct type.
     * @throws FullException if the Stack is full.
     * @return void
     */
    function push($object);

    /**
     * @throws EmptyException if the Stack is empty.
     * @return mixed
     */
    function pop();

    /**
     * @throws EmptyException if the Stack is empty.
     * @return mixed
     */
    function peek();

}
