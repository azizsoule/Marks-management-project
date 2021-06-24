<?php

namespace Base;

use \Etudiant as ChildEtudiant;
use \EtudiantQuery as ChildEtudiantQuery;
use \Exception;
use \PDO;
use Map\EtudiantTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'etudiant' table.
 *
 *
 *
 * @method     ChildEtudiantQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEtudiantQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     ChildEtudiantQuery orderByPrenoms($order = Criteria::ASC) Order by the prenoms column
 * @method     ChildEtudiantQuery orderByDatenaissance($order = Criteria::ASC) Order by the dateNaissance column
 * @method     ChildEtudiantQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildEtudiantQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildEtudiantQuery orderByDateajout($order = Criteria::ASC) Order by the dateAjout column
 * @method     ChildEtudiantQuery orderByIdniveau($order = Criteria::ASC) Order by the idNiveau column
 * @method     ChildEtudiantQuery orderByIdgenre($order = Criteria::ASC) Order by the idGenre column
 *
 * @method     ChildEtudiantQuery groupById() Group by the id column
 * @method     ChildEtudiantQuery groupByNom() Group by the nom column
 * @method     ChildEtudiantQuery groupByPrenoms() Group by the prenoms column
 * @method     ChildEtudiantQuery groupByDatenaissance() Group by the dateNaissance column
 * @method     ChildEtudiantQuery groupByEmail() Group by the email column
 * @method     ChildEtudiantQuery groupByContact() Group by the contact column
 * @method     ChildEtudiantQuery groupByDateajout() Group by the dateAjout column
 * @method     ChildEtudiantQuery groupByIdniveau() Group by the idNiveau column
 * @method     ChildEtudiantQuery groupByIdgenre() Group by the idGenre column
 *
 * @method     ChildEtudiantQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEtudiantQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEtudiantQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEtudiantQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEtudiantQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEtudiantQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEtudiantQuery leftJoinNiveau($relationAlias = null) Adds a LEFT JOIN clause to the query using the Niveau relation
 * @method     ChildEtudiantQuery rightJoinNiveau($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Niveau relation
 * @method     ChildEtudiantQuery innerJoinNiveau($relationAlias = null) Adds a INNER JOIN clause to the query using the Niveau relation
 *
 * @method     ChildEtudiantQuery joinWithNiveau($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Niveau relation
 *
 * @method     ChildEtudiantQuery leftJoinWithNiveau() Adds a LEFT JOIN clause and with to the query using the Niveau relation
 * @method     ChildEtudiantQuery rightJoinWithNiveau() Adds a RIGHT JOIN clause and with to the query using the Niveau relation
 * @method     ChildEtudiantQuery innerJoinWithNiveau() Adds a INNER JOIN clause and with to the query using the Niveau relation
 *
 * @method     ChildEtudiantQuery leftJoinGenre($relationAlias = null) Adds a LEFT JOIN clause to the query using the Genre relation
 * @method     ChildEtudiantQuery rightJoinGenre($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Genre relation
 * @method     ChildEtudiantQuery innerJoinGenre($relationAlias = null) Adds a INNER JOIN clause to the query using the Genre relation
 *
 * @method     ChildEtudiantQuery joinWithGenre($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Genre relation
 *
 * @method     ChildEtudiantQuery leftJoinWithGenre() Adds a LEFT JOIN clause and with to the query using the Genre relation
 * @method     ChildEtudiantQuery rightJoinWithGenre() Adds a RIGHT JOIN clause and with to the query using the Genre relation
 * @method     ChildEtudiantQuery innerJoinWithGenre() Adds a INNER JOIN clause and with to the query using the Genre relation
 *
 * @method     ChildEtudiantQuery leftJoinNote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Note relation
 * @method     ChildEtudiantQuery rightJoinNote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Note relation
 * @method     ChildEtudiantQuery innerJoinNote($relationAlias = null) Adds a INNER JOIN clause to the query using the Note relation
 *
 * @method     ChildEtudiantQuery joinWithNote($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Note relation
 *
 * @method     ChildEtudiantQuery leftJoinWithNote() Adds a LEFT JOIN clause and with to the query using the Note relation
 * @method     ChildEtudiantQuery rightJoinWithNote() Adds a RIGHT JOIN clause and with to the query using the Note relation
 * @method     ChildEtudiantQuery innerJoinWithNote() Adds a INNER JOIN clause and with to the query using the Note relation
 *
 * @method     \NiveauQuery|\GenreQuery|\NoteQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEtudiant|null findOne(ConnectionInterface $con = null) Return the first ChildEtudiant matching the query
 * @method     ChildEtudiant findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEtudiant matching the query, or a new ChildEtudiant object populated from the query conditions when no match is found
 *
 * @method     ChildEtudiant|null findOneById(int $id) Return the first ChildEtudiant filtered by the id column
 * @method     ChildEtudiant|null findOneByNom(string $nom) Return the first ChildEtudiant filtered by the nom column
 * @method     ChildEtudiant|null findOneByPrenoms(string $prenoms) Return the first ChildEtudiant filtered by the prenoms column
 * @method     ChildEtudiant|null findOneByDatenaissance(string $dateNaissance) Return the first ChildEtudiant filtered by the dateNaissance column
 * @method     ChildEtudiant|null findOneByEmail(string $email) Return the first ChildEtudiant filtered by the email column
 * @method     ChildEtudiant|null findOneByContact(string $contact) Return the first ChildEtudiant filtered by the contact column
 * @method     ChildEtudiant|null findOneByDateajout(string $dateAjout) Return the first ChildEtudiant filtered by the dateAjout column
 * @method     ChildEtudiant|null findOneByIdniveau(int $idNiveau) Return the first ChildEtudiant filtered by the idNiveau column
 * @method     ChildEtudiant|null findOneByIdgenre(int $idGenre) Return the first ChildEtudiant filtered by the idGenre column *

 * @method     ChildEtudiant requirePk($key, ConnectionInterface $con = null) Return the ChildEtudiant by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOne(ConnectionInterface $con = null) Return the first ChildEtudiant matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEtudiant requireOneById(int $id) Return the first ChildEtudiant filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByNom(string $nom) Return the first ChildEtudiant filtered by the nom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByPrenoms(string $prenoms) Return the first ChildEtudiant filtered by the prenoms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByDatenaissance(string $dateNaissance) Return the first ChildEtudiant filtered by the dateNaissance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByEmail(string $email) Return the first ChildEtudiant filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByContact(string $contact) Return the first ChildEtudiant filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByDateajout(string $dateAjout) Return the first ChildEtudiant filtered by the dateAjout column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByIdniveau(int $idNiveau) Return the first ChildEtudiant filtered by the idNiveau column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEtudiant requireOneByIdgenre(int $idGenre) Return the first ChildEtudiant filtered by the idGenre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEtudiant[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEtudiant objects based on current ModelCriteria
 * @method     ChildEtudiant[]|ObjectCollection findById(int $id) Return ChildEtudiant objects filtered by the id column
 * @method     ChildEtudiant[]|ObjectCollection findByNom(string $nom) Return ChildEtudiant objects filtered by the nom column
 * @method     ChildEtudiant[]|ObjectCollection findByPrenoms(string $prenoms) Return ChildEtudiant objects filtered by the prenoms column
 * @method     ChildEtudiant[]|ObjectCollection findByDatenaissance(string $dateNaissance) Return ChildEtudiant objects filtered by the dateNaissance column
 * @method     ChildEtudiant[]|ObjectCollection findByEmail(string $email) Return ChildEtudiant objects filtered by the email column
 * @method     ChildEtudiant[]|ObjectCollection findByContact(string $contact) Return ChildEtudiant objects filtered by the contact column
 * @method     ChildEtudiant[]|ObjectCollection findByDateajout(string $dateAjout) Return ChildEtudiant objects filtered by the dateAjout column
 * @method     ChildEtudiant[]|ObjectCollection findByIdniveau(int $idNiveau) Return ChildEtudiant objects filtered by the idNiveau column
 * @method     ChildEtudiant[]|ObjectCollection findByIdgenre(int $idGenre) Return ChildEtudiant objects filtered by the idGenre column
 * @method     ChildEtudiant[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EtudiantQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EtudiantQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Etudiant', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEtudiantQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEtudiantQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEtudiantQuery) {
            return $criteria;
        }
        $query = new ChildEtudiantQuery();
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
     * @return ChildEtudiant|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EtudiantTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EtudiantTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEtudiant A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nom, prenoms, dateNaissance, email, contact, dateAjout, idNiveau, idGenre FROM etudiant WHERE id = :p0';
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
            /** @var ChildEtudiant $obj */
            $obj = new ChildEtudiant();
            $obj->hydrate($row);
            EtudiantTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEtudiant|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EtudiantTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EtudiantTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the prenoms column
     *
     * Example usage:
     * <code>
     * $query->filterByPrenoms('fooValue');   // WHERE prenoms = 'fooValue'
     * $query->filterByPrenoms('%fooValue%', Criteria::LIKE); // WHERE prenoms LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prenoms The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByPrenoms($prenoms = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prenoms)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_PRENOMS, $prenoms, $comparison);
    }

    /**
     * Filter the query on the dateNaissance column
     *
     * Example usage:
     * <code>
     * $query->filterByDatenaissance('2011-03-14'); // WHERE dateNaissance = '2011-03-14'
     * $query->filterByDatenaissance('now'); // WHERE dateNaissance = '2011-03-14'
     * $query->filterByDatenaissance(array('max' => 'yesterday')); // WHERE dateNaissance > '2011-03-13'
     * </code>
     *
     * @param     mixed $datenaissance The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByDatenaissance($datenaissance = null, $comparison = null)
    {
        if (is_array($datenaissance)) {
            $useMinMax = false;
            if (isset($datenaissance['min'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_DATENAISSANCE, $datenaissance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datenaissance['max'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_DATENAISSANCE, $datenaissance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_DATENAISSANCE, $datenaissance, $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the dateAjout column
     *
     * Example usage:
     * <code>
     * $query->filterByDateajout('2011-03-14'); // WHERE dateAjout = '2011-03-14'
     * $query->filterByDateajout('now'); // WHERE dateAjout = '2011-03-14'
     * $query->filterByDateajout(array('max' => 'yesterday')); // WHERE dateAjout > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateajout The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByDateajout($dateajout = null, $comparison = null)
    {
        if (is_array($dateajout)) {
            $useMinMax = false;
            if (isset($dateajout['min'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_DATEAJOUT, $dateajout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateajout['max'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_DATEAJOUT, $dateajout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_DATEAJOUT, $dateajout, $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByIdniveau($idniveau = null, $comparison = null)
    {
        if (is_array($idniveau)) {
            $useMinMax = false;
            if (isset($idniveau['min'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_IDNIVEAU, $idniveau['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idniveau['max'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_IDNIVEAU, $idniveau['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_IDNIVEAU, $idniveau, $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByIdgenre($idgenre = null, $comparison = null)
    {
        if (is_array($idgenre)) {
            $useMinMax = false;
            if (isset($idgenre['min'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_IDGENRE, $idgenre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idgenre['max'])) {
                $this->addUsingAlias(EtudiantTableMap::COL_IDGENRE, $idgenre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EtudiantTableMap::COL_IDGENRE, $idgenre, $comparison);
    }

    /**
     * Filter the query by a related \Niveau object
     *
     * @param \Niveau|ObjectCollection $niveau The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByNiveau($niveau, $comparison = null)
    {
        if ($niveau instanceof \Niveau) {
            return $this
                ->addUsingAlias(EtudiantTableMap::COL_IDNIVEAU, $niveau->getId(), $comparison);
        } elseif ($niveau instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EtudiantTableMap::COL_IDNIVEAU, $niveau->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
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
     * Filter the query by a related \Genre object
     *
     * @param \Genre|ObjectCollection $genre The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByGenre($genre, $comparison = null)
    {
        if ($genre instanceof \Genre) {
            return $this
                ->addUsingAlias(EtudiantTableMap::COL_IDGENRE, $genre->getId(), $comparison);
        } elseif ($genre instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EtudiantTableMap::COL_IDGENRE, $genre->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
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
     * Filter the query by a related \Note object
     *
     * @param \Note|ObjectCollection $note the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEtudiantQuery The current query, for fluid interface
     */
    public function filterByNote($note, $comparison = null)
    {
        if ($note instanceof \Note) {
            return $this
                ->addUsingAlias(EtudiantTableMap::COL_ID, $note->getIdetudiant(), $comparison);
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
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function joinNote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useNoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
        ?string $joinType = Criteria::INNER_JOIN
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
     * @param   ChildEtudiant $etudiant Object to remove from the list of results
     *
     * @return $this|ChildEtudiantQuery The current query, for fluid interface
     */
    public function prune($etudiant = null)
    {
        if ($etudiant) {
            $this->addUsingAlias(EtudiantTableMap::COL_ID, $etudiant->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the etudiant table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EtudiantTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EtudiantTableMap::clearInstancePool();
            EtudiantTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EtudiantTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EtudiantTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EtudiantTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EtudiantTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EtudiantQuery
