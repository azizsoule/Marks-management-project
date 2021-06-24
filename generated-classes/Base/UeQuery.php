<?php

namespace Base;

use \Ue as ChildUe;
use \UeQuery as ChildUeQuery;
use \Exception;
use \PDO;
use Map\UeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ue' table.
 *
 *
 *
 * @method     ChildUeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUeQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 * @method     ChildUeQuery orderByHasecue($order = Criteria::ASC) Order by the hasEcue column
 * @method     ChildUeQuery orderByIdniveau($order = Criteria::ASC) Order by the idNiveau column
 *
 * @method     ChildUeQuery groupById() Group by the id column
 * @method     ChildUeQuery groupByLibelle() Group by the libelle column
 * @method     ChildUeQuery groupByHasecue() Group by the hasEcue column
 * @method     ChildUeQuery groupByIdniveau() Group by the idNiveau column
 *
 * @method     ChildUeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUeQuery leftJoinNiveau($relationAlias = null) Adds a LEFT JOIN clause to the query using the Niveau relation
 * @method     ChildUeQuery rightJoinNiveau($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Niveau relation
 * @method     ChildUeQuery innerJoinNiveau($relationAlias = null) Adds a INNER JOIN clause to the query using the Niveau relation
 *
 * @method     ChildUeQuery joinWithNiveau($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Niveau relation
 *
 * @method     ChildUeQuery leftJoinWithNiveau() Adds a LEFT JOIN clause and with to the query using the Niveau relation
 * @method     ChildUeQuery rightJoinWithNiveau() Adds a RIGHT JOIN clause and with to the query using the Niveau relation
 * @method     ChildUeQuery innerJoinWithNiveau() Adds a INNER JOIN clause and with to the query using the Niveau relation
 *
 * @method     ChildUeQuery leftJoinEcue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ecue relation
 * @method     ChildUeQuery rightJoinEcue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ecue relation
 * @method     ChildUeQuery innerJoinEcue($relationAlias = null) Adds a INNER JOIN clause to the query using the Ecue relation
 *
 * @method     ChildUeQuery joinWithEcue($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Ecue relation
 *
 * @method     ChildUeQuery leftJoinWithEcue() Adds a LEFT JOIN clause and with to the query using the Ecue relation
 * @method     ChildUeQuery rightJoinWithEcue() Adds a RIGHT JOIN clause and with to the query using the Ecue relation
 * @method     ChildUeQuery innerJoinWithEcue() Adds a INNER JOIN clause and with to the query using the Ecue relation
 *
 * @method     \NiveauQuery|\EcueQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUe|null findOne(ConnectionInterface $con = null) Return the first ChildUe matching the query
 * @method     ChildUe findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUe matching the query, or a new ChildUe object populated from the query conditions when no match is found
 *
 * @method     ChildUe|null findOneById(int $id) Return the first ChildUe filtered by the id column
 * @method     ChildUe|null findOneByLibelle(string $libelle) Return the first ChildUe filtered by the libelle column
 * @method     ChildUe|null findOneByHasecue(boolean $hasEcue) Return the first ChildUe filtered by the hasEcue column
 * @method     ChildUe|null findOneByIdniveau(int $idNiveau) Return the first ChildUe filtered by the idNiveau column *

 * @method     ChildUe requirePk($key, ConnectionInterface $con = null) Return the ChildUe by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUe requireOne(ConnectionInterface $con = null) Return the first ChildUe matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUe requireOneById(int $id) Return the first ChildUe filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUe requireOneByLibelle(string $libelle) Return the first ChildUe filtered by the libelle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUe requireOneByHasecue(boolean $hasEcue) Return the first ChildUe filtered by the hasEcue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUe requireOneByIdniveau(int $idNiveau) Return the first ChildUe filtered by the idNiveau column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUe[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUe objects based on current ModelCriteria
 * @method     ChildUe[]|ObjectCollection findById(int $id) Return ChildUe objects filtered by the id column
 * @method     ChildUe[]|ObjectCollection findByLibelle(string $libelle) Return ChildUe objects filtered by the libelle column
 * @method     ChildUe[]|ObjectCollection findByHasecue(boolean $hasEcue) Return ChildUe objects filtered by the hasEcue column
 * @method     ChildUe[]|ObjectCollection findByIdniveau(int $idNiveau) Return ChildUe objects filtered by the idNiveau column
 * @method     ChildUe[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Ue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUeQuery) {
            return $criteria;
        }
        $query = new ChildUeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUe|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUe A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, libelle, hasEcue, idNiveau FROM ue WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUe $obj */
            $obj = new ChildUe();
            $obj->hydrate($row);
            UeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUe|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UeTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the libelle column
     *
     * Example usage:
     * <code>
     * $query->filterByLibelle('fooValue');   // WHERE libelle = 'fooValue'
     * $query->filterByLibelle('%fooValue%', Criteria::LIKE); // WHERE libelle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $libelle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterByLibelle($libelle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UeTableMap::COL_LIBELLE, $libelle, $comparison);
    }

    /**
     * Filter the query on the hasEcue column
     *
     * Example usage:
     * <code>
     * $query->filterByHasecue(true); // WHERE hasEcue = true
     * $query->filterByHasecue('yes'); // WHERE hasEcue = true
     * </code>
     *
     * @param     boolean|string $hasecue The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterByHasecue($hasecue = null, $comparison = null)
    {
        if (is_string($hasecue)) {
            $hasecue = in_array(strtolower($hasecue), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UeTableMap::COL_HASECUE, $hasecue, $comparison);
    }

    /**
     * Filter the query on the idNiveau column
     *
     * Example usage:
     * <code>
     * $query->filterByIdniveau(1234); // WHERE idNiveau = 1234
     * $query->filterByIdniveau(array(12, 34)); // WHERE idNiveau IN (12, 34)
     * $query->filterByIdniveau(array('min' => 12)); // WHERE idNiveau > 12
     * </code>
     *
     * @see       filterByNiveau()
     *
     * @param     mixed $idniveau The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function filterByIdniveau($idniveau = null, $comparison = null)
    {
        if (is_array($idniveau)) {
            $useMinMax = false;
            if (isset($idniveau['min'])) {
                $this->addUsingAlias(UeTableMap::COL_IDNIVEAU, $idniveau['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idniveau['max'])) {
                $this->addUsingAlias(UeTableMap::COL_IDNIVEAU, $idniveau['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UeTableMap::COL_IDNIVEAU, $idniveau, $comparison);
    }

    /**
     * Filter the query by a related \Niveau object
     *
     * @param \Niveau|ObjectCollection $niveau The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUeQuery The current query, for fluid interface
     */
    public function filterByNiveau($niveau, $comparison = null)
    {
        if ($niveau instanceof \Niveau) {
            return $this
                ->addUsingAlias(UeTableMap::COL_IDNIVEAU, $niveau->getId(), $comparison);
        } elseif ($niveau instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UeTableMap::COL_IDNIVEAU, $niveau->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByNiveau() only accepts arguments of type \Niveau or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Niveau relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function joinNiveau($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Niveau');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Niveau');
        }

        return $this;
    }

    /**
     * Use the Niveau relation Niveau object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NiveauQuery A secondary query class using the current class as primary query
     */
    public function useNiveauQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNiveau($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Niveau', '\NiveauQuery');
    }

    /**
     * Use the Niveau relation Niveau object
     *
     * @param callable(\NiveauQuery):\NiveauQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withNiveauQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useNiveauQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Niveau table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \NiveauQuery The inner query object of the EXISTS statement
     */
    public function useNiveauExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Niveau', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Niveau table for a NOT EXISTS query.
     *
     * @see useNiveauExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \NiveauQuery The inner query object of the NOT EXISTS statement
     */
    public function useNiveauNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Niveau', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Ecue object
     *
     * @param \Ecue|ObjectCollection $ecue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUeQuery The current query, for fluid interface
     */
    public function filterByEcue($ecue, $comparison = null)
    {
        if ($ecue instanceof \Ecue) {
            return $this
                ->addUsingAlias(UeTableMap::COL_ID, $ecue->getIdue(), $comparison);
        } elseif ($ecue instanceof ObjectCollection) {
            return $this
                ->useEcueQuery()
                ->filterByPrimaryKeys($ecue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEcue() only accepts arguments of type \Ecue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ecue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function joinEcue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ecue');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Ecue');
        }

        return $this;
    }

    /**
     * Use the Ecue relation Ecue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EcueQuery A secondary query class using the current class as primary query
     */
    public function useEcueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEcue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ecue', '\EcueQuery');
    }

    /**
     * Use the Ecue relation Ecue object
     *
     * @param callable(\EcueQuery):\EcueQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withEcueQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useEcueQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Ecue table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \EcueQuery The inner query object of the EXISTS statement
     */
    public function useEcueExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Ecue', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Ecue table for a NOT EXISTS query.
     *
     * @see useEcueExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \EcueQuery The inner query object of the NOT EXISTS statement
     */
    public function useEcueNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Ecue', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildUe $ue Object to remove from the list of results
     *
     * @return $this|ChildUeQuery The current query, for fluid interface
     */
    public function prune($ue = null)
    {
        if ($ue) {
            $this->addUsingAlias(UeTableMap::COL_ID, $ue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UeTableMap::clearInstancePool();
            UeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UeQuery
