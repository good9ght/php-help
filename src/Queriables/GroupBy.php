<?php

namespace SimpleORM\Queriables;

class GroupBy implements Queriable
{
    protected $columns = [];
    protected $where;

    public function __construct(...$columns)
    {
        $this->columns = $columns;
        $this->where = new Where();
    }

    public function having(...$columns)
    {
        $this->where->add(...$columns);
    }

    public function params()
    {
        return $this->where->params();
    }

    public function __toString()
    {
        if ($this->columns == []) {
            return '';
        }

        $query = 'group by ' . implode(', ', $this->columns);

        if ("$this->where") {
            $query .= ' having ' . $this->where->conditions();
        }

        return $query;
    }
}
