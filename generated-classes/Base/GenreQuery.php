<?php

namespace Base;

use \Genre as ChildGenre;
use \GenreQuery as ChildGenreQuery;
use \Exception;
use \PDO;
use Map\GenreTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'genre' table.
 *
 *
 *
 * @method     ChildGenreQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGenreQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 *
 * @method     ChildGenreQuery groupById() Group by the id column
 * @method     ChildGenreQuery groupByLibelle() Group by the libelle column
 *
 * @method     ChildGenreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGenreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGenreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGenreQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGenreQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGenreQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGenreQuery leftJoinAdmin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Admin relation
 * @method     ChildGenreQuery rightJoinAdmin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Admin relation
 * @method     ChildGenreQuery innerJoinAdmin($relationAlias = null) Adds a INNER JOIN clause to the query using the Admin relation
 *
 * @method     ChildGenreQuery joinWithAdmin($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Admin relation
 *
 * @method     ChildGenreQuery leftJoinWithAdmin() Adds a LEFT JOIN clause and with to the query using the Admin relation
 * @method     ChildGenreQuery rightJoinWithAdmin() Adds a RIGHT JOIN clause and with to the query using the Admin relation
 * @method     ChildGenreQuery innerJoinWithAdmin() Adds a INNER JOIN clause and with to the query using the Admin relation
 *
 * @method     ChildGenreQuery leftJoinEtudiant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Etudiant relation
 * @method     ChildGenreQuery rightJoinEtudiant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Etudiant relation
 * @method     ChildGenreQuery innerJoinEtudiant($relationAlias = null) Adds a INNER JOIN clause to the query using the Etudiant relation
 *
 * @method     ChildGenreQuery joinWithEtudiant($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Etudiant relation
 *
 * @method     ChildGenreQuery leftJoinWithEtudiant() Adds a LEFT JOIN clause and with to the query using the Etudiant relation
 * @method     ChildGenreQuery rightJoinWithEtudiant() Adds a RIGHT JOIN clause and with to the query using the Etudiant relation
 * @method     ChildGenreQuery innerJoinWithEtudiant() Adds a INNER JOIN clause and with to the query using the Etudiant relation
 *
 * @method     \AdminQuery|\EtudiantQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGenre|null findOne(ConnectionInterface $con = null) Return the first ChildGenre matching the query
 * @method     ChildGenre findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGenre matching the query, or a new ChildGenre object populated from the query conditions when no match is found
 *
 * @method     ChildGenre|null findOneById(int $id) Return the first ChildGenre filtered by the id column
 * @method     ChildGenre|null findOneByLibelle(string $libelle) Return the first ChildGenre filtered by the libelle column *

 * @method     ChildGenre requirePk($key, ConnectionInterface $con = null) Return the ChildGenre by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGenre requireOne(ConnectionInterface $con = null) Return the first ChildGenre matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGenre requireOneById(int $id) Return the first ChildGenre filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGenre requireOneByLibelle(string $libelle) Return the first ChildGenre filtered by the libelle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGenre[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGenre objects based on current ModelCriteria
 * @method     ChildGenre[]|ObjectCollection findById(int $id) Return ChildGenre objects filtered by the id column
 * @method     ChildGenre[]|ObjectCollection findByLibelle(string $libelle) Return ChildGenre objects filtered by the libelle column
 * @method     ChildGenre[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GenreQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\GenreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Genre', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGenreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGenreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGenreQuery) {
            return $criteria;
        }
        $query = new ChildGenreQuery();
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
     * @return ChildGenre|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GenreTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GenreTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGenre A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, libelle FROM genre WHERE id = :p0';
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
            /** @var ChildGenre $obj */
            $obj = new ChildGenre();
            $obj->hydrate($row);
            GenreTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGenre|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GenreTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GenreTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GenreTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GenreTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GenreTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function filterByLibelle($libelle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GenreTableMap::COL_LIBELLE, $libelle, $comparison);
    }

    /**
     * Filter the query by a related \Admin object
     *
     * @param \Admin|ObjectCollection $admin the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGenreQuery The current query, for fluid interface
     */
    public function filterByAdmin($admin, $comparison = null)
    {
        if ($admin instanceof \Admin) {
            return $this
                ->addUsingAlias(GenreTableMap::COL_ID, $admin->getIdgenre(), $comparison);
        } elseif ($admin instanceof ObjectCollection) {
            return $this
                ->useAdminQuery()
                ->filterByPrimaryKeys($admin->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAdmin() only accepts arguments of type \Admin or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Admin relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function joinAdmin($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Admin');

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
            $this->addJoinObject($join, 'Admin');
        }

        return $this;
    }

    /**
     * Use the Admin relation Admin object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AdminQuery A secondary query class using the current class as primary query
     */
    public function useAdminQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAdmin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Admin', '\AdminQuery');
    }

    /**
     * Use the Admin relation Admin object
     *
     * @param callable(\AdminQuery):\AdminQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withAdminQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useAdminQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Admin table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \AdminQuery The inner query object of the EXISTS statement
     */
    public function useAdminExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Admin', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Admin table for a NOT EXISTS query.
     *
     * @see useAdminExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \AdminQuery The inner query object of the NOT EXISTS statement
     */
    public function useAdminNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Admin', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Etudiant object
     *
     * @param \Etudiant|ObjectCollection $etudiant the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGenreQuery The current query, for fluid interface
     */
    public function filterByEtudiant($etudiant, $comparison = null)
    {
        if ($etudiant instanceof \Etudiant) {
            return $this
                ->addUsingAlias(GenreTableMap::COL_ID, $etudiant->getIdgenre(), $comparison);
        } elseif ($etudiant instanceof ObjectCollection) {
            return $this
                ->useEtudiantQuery()
                ->filterByPrimaryKeys($etudiant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEtudiant() only accepts arguments of type \Etudiant or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Etudiant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function joinEtudiant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Etudiant');

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
            $this->addJoinObject($join, 'Etudiant');
        }

        return $this;
    }

    /**
     * Use the Etudiant relation Etudiant object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EtudiantQuery A secondary query class using the current class as primary query
     */
    public function useEtudiantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEtudiant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Etudiant', '\EtudiantQuery');
    }

    /**
     * Use the Etudiant relation Etudiant object
     *
     * @param callable(\EtudiantQuery):\EtudiantQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withEtudiantQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useEtudiantQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Etudiant table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \EtudiantQuery The inner query object of the EXISTS statement
     */
    public function useEtudiantExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Etudiant', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Etudiant table for a NOT EXISTS query.
     *
     * @see useEtudiantExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \EtudiantQuery The inner query object of the NOT EXISTS statement
     */
    public function useEtudiantNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Etudiant', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildGenre $genre Object to remove from the list of results
     *
     * @return $this|ChildGenreQuery The current query, for fluid interface
     */
    public function prune($genre = null)
    {
        if ($genre) {
            $this->addUsingAlias(GenreTableMap::COL_ID, $genre->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the genre table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GenreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GenreTableMap::clearInstancePool();
            GenreTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GenreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GenreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GenreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GenreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GenreQuery
