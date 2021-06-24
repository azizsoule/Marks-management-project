<?php

namespace Base;

use \Admin as ChildAdmin;
use \AdminQuery as ChildAdminQuery;
use \Exception;
use \PDO;
use Map\AdminTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'admin' table.
 *
 *
 *
 * @method     ChildAdminQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAdminQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     ChildAdminQuery orderByPrénoms($order = Criteria::ASC) Order by the prénoms column
 * @method     ChildAdminQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAdminQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildAdminQuery orderByIdgenre($order = Criteria::ASC) Order by the idGenre column
 * @method     ChildAdminQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildAdminQuery orderByPassword($order = Criteria::ASC) Order by the password column
 *
 * @method     ChildAdminQuery groupById() Group by the id column
 * @method     ChildAdminQuery groupByNom() Group by the nom column
 * @method     ChildAdminQuery groupByPrénoms() Group by the prénoms column
 * @method     ChildAdminQuery groupByEmail() Group by the email column
 * @method     ChildAdminQuery groupByContact() Group by the contact column
 * @method     ChildAdminQuery groupByIdgenre() Group by the idGenre column
 * @method     ChildAdminQuery groupByUsername() Group by the username column
 * @method     ChildAdminQuery groupByPassword() Group by the password column
 *
 * @method     ChildAdminQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdminQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdminQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdminQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdminQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdminQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdminQuery leftJoinGenre($relationAlias = null) Adds a LEFT JOIN clause to the query using the Genre relation
 * @method     ChildAdminQuery rightJoinGenre($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Genre relation
 * @method     ChildAdminQuery innerJoinGenre($relationAlias = null) Adds a INNER JOIN clause to the query using the Genre relation
 *
 * @method     ChildAdminQuery joinWithGenre($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Genre relation
 *
 * @method     ChildAdminQuery leftJoinWithGenre() Adds a LEFT JOIN clause and with to the query using the Genre relation
 * @method     ChildAdminQuery rightJoinWithGenre() Adds a RIGHT JOIN clause and with to the query using the Genre relation
 * @method     ChildAdminQuery innerJoinWithGenre() Adds a INNER JOIN clause and with to the query using the Genre relation
 *
 * @method     \GenreQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAdmin|null findOne(ConnectionInterface $con = null) Return the first ChildAdmin matching the query
 * @method     ChildAdmin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAdmin matching the query, or a new ChildAdmin object populated from the query conditions when no match is found
 *
 * @method     ChildAdmin|null findOneById(int $id) Return the first ChildAdmin filtered by the id column
 * @method     ChildAdmin|null findOneByNom(string $nom) Return the first ChildAdmin filtered by the nom column
 * @method     ChildAdmin|null findOneByPrénoms(string $prénoms) Return the first ChildAdmin filtered by the prénoms column
 * @method     ChildAdmin|null findOneByEmail(string $email) Return the first ChildAdmin filtered by the email column
 * @method     ChildAdmin|null findOneByContact(string $contact) Return the first ChildAdmin filtered by the contact column
 * @method     ChildAdmin|null findOneByIdgenre(int $idGenre) Return the first ChildAdmin filtered by the idGenre column
 * @method     ChildAdmin|null findOneByUsername(string $username) Return the first ChildAdmin filtered by the username column
 * @method     ChildAdmin|null findOneByPassword(string $password) Return the first ChildAdmin filtered by the password column *

 * @method     ChildAdmin requirePk($key, ConnectionInterface $con = null) Return the ChildAdmin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOne(ConnectionInterface $con = null) Return the first ChildAdmin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin requireOneById(int $id) Return the first ChildAdmin filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByNom(string $nom) Return the first ChildAdmin filtered by the nom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByPrénoms(string $prénoms) Return the first ChildAdmin filtered by the prénoms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByEmail(string $email) Return the first ChildAdmin filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByContact(string $contact) Return the first ChildAdmin filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByIdgenre(int $idGenre) Return the first ChildAdmin filtered by the idGenre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByUsername(string $username) Return the first ChildAdmin filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByPassword(string $password) Return the first ChildAdmin filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAdmin objects based on current ModelCriteria
 * @method     ChildAdmin[]|ObjectCollection findById(int $id) Return ChildAdmin objects filtered by the id column
 * @method     ChildAdmin[]|ObjectCollection findByNom(string $nom) Return ChildAdmin objects filtered by the nom column
 * @method     ChildAdmin[]|ObjectCollection findByPrénoms(string $prénoms) Return ChildAdmin objects filtered by the prénoms column
 * @method     ChildAdmin[]|ObjectCollection findByEmail(string $email) Return ChildAdmin objects filtered by the email column
 * @method     ChildAdmin[]|ObjectCollection findByContact(string $contact) Return ChildAdmin objects filtered by the contact column
 * @method     ChildAdmin[]|ObjectCollection findByIdgenre(int $idGenre) Return ChildAdmin objects filtered by the idGenre column
 * @method     ChildAdmin[]|ObjectCollection findByUsername(string $username) Return ChildAdmin objects filtered by the username column
 * @method     ChildAdmin[]|ObjectCollection findByPassword(string $password) Return ChildAdmin objects filtered by the password column
 * @method     ChildAdmin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AdminQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AdminQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Admin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdminQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdminQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAdminQuery) {
            return $criteria;
        }
        $query = new ChildAdminQuery();
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdminTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdminTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAdmin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nom, prénoms, email, contact, idGenre, username, password FROM admin WHERE id = :p0';
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
            /** @var ChildAdmin $obj */
            $obj = new ChildAdmin();
            $obj->hydrate($row);
            AdminTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdminTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdminTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AdminTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AdminTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%', Criteria::LIKE); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the prénoms column
     *
     * Example usage:
     * <code>
     * $query->filterByPrénoms('fooValue');   // WHERE prénoms = 'fooValue'
     * $query->filterByPrénoms('%fooValue%', Criteria::LIKE); // WHERE prénoms LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prénoms The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPrénoms($prénoms = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prénoms)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_PRéNOMS, $prénoms, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the idGenre column
     *
     * Example usage:
     * <code>
     * $query->filterByIdgenre(1234); // WHERE idGenre = 1234
     * $query->filterByIdgenre(array(12, 34)); // WHERE idGenre IN (12, 34)
     * $query->filterByIdgenre(array('min' => 12)); // WHERE idGenre > 12
     * </code>
     *
     * @see       filterByGenre()
     *
     * @param     mixed $idgenre The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByIdgenre($idgenre = null, $comparison = null)
    {
        if (is_array($idgenre)) {
            $useMinMax = false;
            if (isset($idgenre['min'])) {
                $this->addUsingAlias(AdminTableMap::COL_IDGENRE, $idgenre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idgenre['max'])) {
                $this->addUsingAlias(AdminTableMap::COL_IDGENRE, $idgenre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_IDGENRE, $idgenre, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdminTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query by a related \Genre object
     *
     * @param \Genre|ObjectCollection $genre The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAdminQuery The current query, for fluid interface
     */
    public function filterByGenre($genre, $comparison = null)
    {
        if ($genre instanceof \Genre) {
            return $this
                ->addUsingAlias(AdminTableMap::COL_IDGENRE, $genre->getId(), $comparison);
        } elseif ($genre instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdminTableMap::COL_IDGENRE, $genre->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGenre() only accepts arguments of type \Genre or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Genre relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function joinGenre($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Genre');

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
            $this->addJoinObject($join, 'Genre');
        }

        return $this;
    }

    /**
     * Use the Genre relation Genre object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \GenreQuery A secondary query class using the current class as primary query
     */
    public function useGenreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGenre($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Genre', '\GenreQuery');
    }

    /**
     * Use the Genre relation Genre object
     *
     * @param callable(\GenreQuery):\GenreQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withGenreQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useGenreQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Genre table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \GenreQuery The inner query object of the EXISTS statement
     */
    public function useGenreExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Genre', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Genre table for a NOT EXISTS query.
     *
     * @see useGenreExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \GenreQuery The inner query object of the NOT EXISTS statement
     */
    public function useGenreNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Genre', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildAdmin $admin Object to remove from the list of results
     *
     * @return $this|ChildAdminQuery The current query, for fluid interface
     */
    public function prune($admin = null)
    {
        if ($admin) {
            $this->addUsingAlias(AdminTableMap::COL_ID, $admin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the admin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdminTableMap::clearInstancePool();
            AdminTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdminTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdminTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdminTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AdminQuery
