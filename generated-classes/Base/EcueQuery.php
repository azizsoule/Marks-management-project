<?php

namespace Base;

use \Ecue as ChildEcue;
use \EcueQuery as ChildEcueQuery;
use \Exception;
use \PDO;
use Map\EcueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ecue' table.
 *
 *
 *
 * @method     ChildEcueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEcueQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 * @method     ChildEcueQuery orderByCredits($order = Criteria::ASC) Order by the credits column
 * @method     ChildEcueQuery orderByIdue($order = Criteria::ASC) Order by the idUe column
 *
 * @method     ChildEcueQuery groupById() Group by the id column
 * @method     ChildEcueQuery groupByLibelle() Group by the libelle column
 * @method     ChildEcueQuery groupByCredits() Group by the credits column
 * @method     ChildEcueQuery groupByIdue() Group by the idUe column
 *
 * @method     ChildEcueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEcueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEcueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEcueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEcueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEcueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEcueQuery leftJoinUe($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ue relation
 * @method     ChildEcueQuery rightJoinUe($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ue relation
 * @method     ChildEcueQuery innerJoinUe($relationAlias = null) Adds a INNER JOIN clause to the query using the Ue relation
 *
 * @method     ChildEcueQuery joinWithUe($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Ue relation
 *
 * @method     ChildEcueQuery leftJoinWithUe() Adds a LEFT JOIN clause and with to the query using the Ue relation
 * @method     ChildEcueQuery rightJoinWithUe() Adds a RIGHT JOIN clause and with to the query using the Ue relation
 * @method     ChildEcueQuery innerJoinWithUe() Adds a INNER JOIN clause and with to the query using the Ue relation
 *
 * @method     ChildEcueQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method     ChildEcueQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method     ChildEcueQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method     ChildEcueQuery joinWithNote($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Note relation
 *
 * @method     ChildEcueQuery leftJoinWithNote() Adds a LEFT JOIN clause and with to the query using the Note relation
 * @method     ChildEcueQuery rightJoinWithNote() Adds a RIGHT JOIN clause and with to the query using the Note relation
 * @method     ChildEcueQuery innerJoinWithNote() Adds a INNER JOIN clause and with to the query using the Note relation
 *
 * @method     \UeQuery|\NoteQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEcue|null findOne(ConnectionInterface $con = null) Return the first ChildEcue matching the query
 * @method     ChildEcue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEcue matching the query, or a new ChildEcue object populated from the query conditions when no match is found
 *
 * @method     ChildEcue|null findOneById(int $id) Return the first ChildEcue filtered by the id column
 * @method     ChildEcue|null findOneByLibelle(string $libelle) Return the first ChildEcue filtered by the libelle column
 * @method     ChildEcue|null findOneByCredits(int $credits) Return the first ChildEcue filtered by the credits column
 * @method     ChildEcue|null findOneByIdue(int $idUe) Return the first ChildEcue filtered by the idUe column *

 * @method     ChildEcue requirePk($key, ConnectionInterface $con = null) Return the ChildEcue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEcue requireOne(ConnectionInterface $con = null) Return the first ChildEcue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEcue requireOneById(int $id) Return the first ChildEcue filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEcue requireOneByLibelle(string $libelle) Return the first ChildEcue filtered by the libelle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEcue requireOneByCredits(int $credits) Return the first ChildEcue filtered by the credits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEcue requireOneByIdue(int $idUe) Return the first ChildEcue filtered by the idUe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEcue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEcue objects based on current ModelCriteria
 * @method     ChildEcue[]|ObjectCollection findById(int $id) Return ChildEcue objects filtered by the id column
 * @method     ChildEcue[]|ObjectCollection findByLibelle(string $libelle) Return ChildEcue objects filtered by the libelle column
 * @method     ChildEcue[]|ObjectCollection findByCredits(int $credits) Return ChildEcue objects filtered by the credits column
 * @method     ChildEcue[]|ObjectCollection findByIdue(int $idUe) Return ChildEcue objects filtered by the idUe column
 * @method     ChildEcue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EcueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EcueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Ecue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEcueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEcueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEcueQuery) {
            return $criteria;
        }
        $query = new ChildEcueQuery();
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
     * @return ChildEcue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EcueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EcueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEcue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, libelle, credits, idUe FROM ecue WHERE id = :p0';
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
            /** @var ChildEcue $obj */
            $obj = new ChildEcue();
            $obj->hydrate($row);
            EcueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEcue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EcueTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EcueTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EcueTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EcueTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EcueTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterByLibelle($libelle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EcueTableMap::COL_LIBELLE, $libelle, $comparison);
    }

    /**
     * Filter the query on the credits column
     *
     * Example usage:
     * <code>
     * $query->filterByCredits(1234); // WHERE credits = 1234
     * $query->filterByCredits(array(12, 34)); // WHERE credits IN (12, 34)
     * $query->filterByCredits(array('min' => 12)); // WHERE credits > 12
     * </code>
     *
     * @param     mixed $credits The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterByCredits($credits = null, $comparison = null)
    {
        if (is_array($credits)) {
            $useMinMax = false;
            if (isset($credits['min'])) {
                $this->addUsingAlias(EcueTableMap::COL_CREDITS, $credits['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credits['max'])) {
                $this->addUsingAlias(EcueTableMap::COL_CREDITS, $credits['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EcueTableMap::COL_CREDITS, $credits, $comparison);
    }

    /**
     * Filter the query on the idUe column
     *
     * Example usage:
     * <code>
     * $query->filterByIdue(1234); // WHERE idUe = 1234
     * $query->filterByIdue(array(12, 34)); // WHERE idUe IN (12, 34)
     * $query->filterByIdue(array('min' => 12)); // WHERE idUe > 12
     * </code>
     *
     * @see       filterByUe()
     *
     * @param     mixed $idue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function filterByIdue($idue = null, $comparison = null)
    {
        if (is_array($idue)) {
            $useMinMax = false;
            if (isset($idue['min'])) {
                $this->addUsingAlias(EcueTableMap::COL_IDUE, $idue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idue['max'])) {
                $this->addUsingAlias(EcueTableMap::COL_IDUE, $idue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EcueTableMap::COL_IDUE, $idue, $comparison);
    }

    /**
     * Filter the query by a related \Ue object
     *
     * @param \Ue|ObjectCollection $ue The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEcueQuery The current query, for fluid interface
     */
    public function filterByUe($ue, $comparison = null)
    {
        if ($ue instanceof \Ue) {
            return $this
                ->addUsingAlias(EcueTableMap::COL_IDUE, $ue->getId(), $comparison);
        } elseif ($ue instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EcueTableMap::COL_IDUE, $ue->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUe() only accepts arguments of type \Ue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function joinUe($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ue');

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
            $this->addJoinObject($join, 'Ue');
        }

        return $this;
    }

    /**
     * Use the Ue relation Ue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UeQuery A secondary query class using the current class as primary query
     */
    public function useUeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUe($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ue', '\UeQuery');
    }

    /**
     * Use the Ue relation Ue object
     *
     * @param callable(\UeQuery):\UeQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withUeQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useUeQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Ue table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \UeQuery The inner query object of the EXISTS statement
     */
    public function useUeExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Ue', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Ue table for a NOT EXISTS query.
     *
     * @see useUeExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \UeQuery The inner query object of the NOT EXISTS statement
     */
    public function useUeNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Ue', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Note object
     *
     * @param \Note|ObjectCollection $note the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEcueQuery The current query, for fluid interface
     */
    public function filterByNote($note, $comparison = null)
    {
        if ($note instanceof \Note) {
            return $this
                ->addUsingAlias(EcueTableMap::COL_ID, $note->getIdecue(), $comparison);
        } elseif ($note instanceof ObjectCollection) {
            return $this
                ->useNoteQuery()
                ->filterByPrimaryKeys($note->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNote() only accepts arguments of type \Note or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Note relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Note');

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
            $this->addJoinObject($join, 'Note');
        }

        return $this;
    }

    /**
     * Use the Note relation Note object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NoteQuery A secondary query class using the current class as primary query
     */
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinNote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Note', '\NoteQuery');
    }

    /**
     * Use the Note relation Note object
     *
     * @param callable(\NoteQuery):\NoteQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withNoteQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useNoteQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Note table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \NoteQuery The inner query object of the EXISTS statement
     */
    public function useNoteExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Note', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Note table for a NOT EXISTS query.
     *
     * @see useNoteExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \NoteQuery The inner query object of the NOT EXISTS statement
     */
    public function useNoteNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Note', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildEcue $ecue Object to remove from the list of results
     *
     * @return $this|ChildEcueQuery The current query, for fluid interface
     */
    public function prune($ecue = null)
    {
        if ($ecue) {
            $this->addUsingAlias(EcueTableMap::COL_ID, $ecue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ecue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EcueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EcueTableMap::clearInstancePool();
            EcueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EcueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EcueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EcueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EcueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EcueQuery
