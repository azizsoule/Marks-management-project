<?php

namespace Base;

use \Note as ChildNote;
use \NoteQuery as ChildNoteQuery;
use \Exception;
use \PDO;
use Map\NoteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'note' table.
 *
 *
 *
 * @method     ChildNoteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNoteQuery orderByIdetudiant($order = Criteria::ASC) Order by the idEtudiant column
 * @method     ChildNoteQuery orderByIdecue($order = Criteria::ASC) Order by the idEcue column
 * @method     ChildNoteQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method     ChildNoteQuery orderByIdbase($order = Criteria::ASC) Order by the idBase column
 * @method     ChildNoteQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildNoteQuery groupById() Group by the id column
 * @method     ChildNoteQuery groupByIdetudiant() Group by the idEtudiant column
 * @method     ChildNoteQuery groupByIdecue() Group by the idEcue column
 * @method     ChildNoteQuery groupByNote() Group by the note column
 * @method     ChildNoteQuery groupByIdbase() Group by the idBase column
 * @method     ChildNoteQuery groupByDate() Group by the date column
 *
 * @method     ChildNoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNoteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNoteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNoteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNoteQuery leftJoinBase($relationAlias = null) Adds a LEFT JOIN clause to the query using the Base relation
 * @method     ChildNoteQuery rightJoinBase($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Base relation
 * @method     ChildNoteQuery innerJoinBase($relationAlias = null) Adds a INNER JOIN clause to the query using the Base relation
 *
 * @method     ChildNoteQuery joinWithBase($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Base relation
 *
 * @method     ChildNoteQuery leftJoinWithBase() Adds a LEFT JOIN clause and with to the query using the Base relation
 * @method     ChildNoteQuery rightJoinWithBase() Adds a RIGHT JOIN clause and with to the query using the Base relation
 * @method     ChildNoteQuery innerJoinWithBase() Adds a INNER JOIN clause and with to the query using the Base relation
 *
 * @method     ChildNoteQuery leftJoinEtudiant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Etudiant relation
 * @method     ChildNoteQuery rightJoinEtudiant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Etudiant relation
 * @method     ChildNoteQuery innerJoinEtudiant($relationAlias = null) Adds a INNER JOIN clause to the query using the Etudiant relation
 *
 * @method     ChildNoteQuery joinWithEtudiant($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Etudiant relation
 *
 * @method     ChildNoteQuery leftJoinWithEtudiant() Adds a LEFT JOIN clause and with to the query using the Etudiant relation
 * @method     ChildNoteQuery rightJoinWithEtudiant() Adds a RIGHT JOIN clause and with to the query using the Etudiant relation
 * @method     ChildNoteQuery innerJoinWithEtudiant() Adds a INNER JOIN clause and with to the query using the Etudiant relation
 *
 * @method     ChildNoteQuery leftJoinEcue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ecue relation
 * @method     ChildNoteQuery rightJoinEcue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ecue relation
 * @method     ChildNoteQuery innerJoinEcue($relationAlias = null) Adds a INNER JOIN clause to the query using the Ecue relation
 *
 * @method     ChildNoteQuery joinWithEcue($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Ecue relation
 *
 * @method     ChildNoteQuery leftJoinWithEcue() Adds a LEFT JOIN clause and with to the query using the Ecue relation
 * @method     ChildNoteQuery rightJoinWithEcue() Adds a RIGHT JOIN clause and with to the query using the Ecue relation
 * @method     ChildNoteQuery innerJoinWithEcue() Adds a INNER JOIN clause and with to the query using the Ecue relation
 *
 * @method     \BaseQuery|\EtudiantQuery|\EcueQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildNote|null findOne(ConnectionInterface $con = null) Return the first ChildNote matching the query
 * @method     ChildNote findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNote matching the query, or a new ChildNote object populated from the query conditions when no match is found
 *
 * @method     ChildNote|null findOneById(int $id) Return the first ChildNote filtered by the id column
 * @method     ChildNote|null findOneByIdetudiant(int $idEtudiant) Return the first ChildNote filtered by the idEtudiant column
 * @method     ChildNote|null findOneByIdecue(int $idEcue) Return the first ChildNote filtered by the idEcue column
 * @method     ChildNote|null findOneByNote(int $note) Return the first ChildNote filtered by the note column
 * @method     ChildNote|null findOneByIdbase(int $idBase) Return the first ChildNote filtered by the idBase column
 * @method     ChildNote|null findOneByDate(string $date) Return the first ChildNote filtered by the date column *

 * @method     ChildNote requirePk($key, ConnectionInterface $con = null) Return the ChildNote by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOne(ConnectionInterface $con = null) Return the first ChildNote matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNote requireOneById(int $id) Return the first ChildNote filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByIdetudiant(int $idEtudiant) Return the first ChildNote filtered by the idEtudiant column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByIdecue(int $idEcue) Return the first ChildNote filtered by the idEcue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByNote(int $note) Return the first ChildNote filtered by the note column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByIdbase(int $idBase) Return the first ChildNote filtered by the idBase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNote requireOneByDate(string $date) Return the first ChildNote filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNote[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNote objects based on current ModelCriteria
 * @method     ChildNote[]|ObjectCollection findById(int $id) Return ChildNote objects filtered by the id column
 * @method     ChildNote[]|ObjectCollection findByIdetudiant(int $idEtudiant) Return ChildNote objects filtered by the idEtudiant column
 * @method     ChildNote[]|ObjectCollection findByIdecue(int $idEcue) Return ChildNote objects filtered by the idEcue column
 * @method     ChildNote[]|ObjectCollection findByNote(int $note) Return ChildNote objects filtered by the note column
 * @method     ChildNote[]|ObjectCollection findByIdbase(int $idBase) Return ChildNote objects filtered by the idBase column
 * @method     ChildNote[]|ObjectCollection findByDate(string $date) Return ChildNote objects filtered by the date column
 * @method     ChildNote[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NoteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NoteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notes', $modelName = '\\Note', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNoteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNoteQuery) {
            return $criteria;
        }
        $query = new ChildNoteQuery();
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
     * @return ChildNote|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NoteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NoteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNote A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, idEtudiant, idEcue, note, idBase, date FROM note WHERE id = :p0';
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
            /** @var ChildNote $obj */
            $obj = new ChildNote();
            $obj->hydrate($row);
            NoteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNote|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NoteTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NoteTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the idEtudiant column
     *
     * Example usage:
     * <code>
     * $query->filterByIdetudiant(1234); // WHERE idEtudiant = 1234
     * $query->filterByIdetudiant(array(12, 34)); // WHERE idEtudiant IN (12, 34)
     * $query->filterByIdetudiant(array('min' => 12)); // WHERE idEtudiant > 12
     * </code>
     *
     * @see       filterByEtudiant()
     *
     * @param     mixed $idetudiant The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByIdetudiant($idetudiant = null, $comparison = null)
    {
        if (is_array($idetudiant)) {
            $useMinMax = false;
            if (isset($idetudiant['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDETUDIANT, $idetudiant['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idetudiant['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDETUDIANT, $idetudiant['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_IDETUDIANT, $idetudiant, $comparison);
    }

    /**
     * Filter the query on the idEcue column
     *
     * Example usage:
     * <code>
     * $query->filterByIdecue(1234); // WHERE idEcue = 1234
     * $query->filterByIdecue(array(12, 34)); // WHERE idEcue IN (12, 34)
     * $query->filterByIdecue(array('min' => 12)); // WHERE idEcue > 12
     * </code>
     *
     * @see       filterByEcue()
     *
     * @param     mixed $idecue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByIdecue($idecue = null, $comparison = null)
    {
        if (is_array($idecue)) {
            $useMinMax = false;
            if (isset($idecue['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDECUE, $idecue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idecue['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDECUE, $idecue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_IDECUE, $idecue, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote(1234); // WHERE note = 1234
     * $query->filterByNote(array(12, 34)); // WHERE note IN (12, 34)
     * $query->filterByNote(array('min' => 12)); // WHERE note > 12
     * </code>
     *
     * @param     mixed $note The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (is_array($note)) {
            $useMinMax = false;
            if (isset($note['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_NOTE, $note['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($note['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_NOTE, $note['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the idBase column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbase(1234); // WHERE idBase = 1234
     * $query->filterByIdbase(array(12, 34)); // WHERE idBase IN (12, 34)
     * $query->filterByIdbase(array('min' => 12)); // WHERE idBase > 12
     * </code>
     *
     * @see       filterByBase()
     *
     * @param     mixed $idbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByIdbase($idbase = null, $comparison = null)
    {
        if (is_array($idbase)) {
            $useMinMax = false;
            if (isset($idbase['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDBASE, $idbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbase['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_IDBASE, $idbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_IDBASE, $idbase, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(NoteTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(NoteTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NoteTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query by a related \Base object
     *
     * @param \Base|ObjectCollection $base The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNoteQuery The current query, for fluid interface
     */
    public function filterByBase($base, $comparison = null)
    {
        if ($base instanceof \Base) {
            return $this
                ->addUsingAlias(NoteTableMap::COL_IDBASE, $base->getId(), $comparison);
        } elseif ($base instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NoteTableMap::COL_IDBASE, $base->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBase() only accepts arguments of type \Base or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Base relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function joinBase($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Base');

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
            $this->addJoinObject($join, 'Base');
        }

        return $this;
    }

    /**
     * Use the Base relation Base object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BaseQuery A secondary query class using the current class as primary query
     */
    public function useBaseQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBase($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Base', '\BaseQuery');
    }

    /**
     * Use the Base relation Base object
     *
     * @param callable(\BaseQuery):\BaseQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withBaseQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useBaseQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Base table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \BaseQuery The inner query object of the EXISTS statement
     */
    public function useBaseExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Base', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Base table for a NOT EXISTS query.
     *
     * @see useBaseExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \BaseQuery The inner query object of the NOT EXISTS statement
     */
    public function useBaseNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Base', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Etudiant object
     *
     * @param \Etudiant|ObjectCollection $etudiant The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNoteQuery The current query, for fluid interface
     */
    public function filterByEtudiant($etudiant, $comparison = null)
    {
        if ($etudiant instanceof \Etudiant) {
            return $this
                ->addUsingAlias(NoteTableMap::COL_IDETUDIANT, $etudiant->getId(), $comparison);
        } elseif ($etudiant instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NoteTableMap::COL_IDETUDIANT, $etudiant->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
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
     * Filter the query by a related \Ecue object
     *
     * @param \Ecue|ObjectCollection $ecue The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNoteQuery The current query, for fluid interface
     */
    public function filterByEcue($ecue, $comparison = null)
    {
        if ($ecue instanceof \Ecue) {
            return $this
                ->addUsingAlias(NoteTableMap::COL_IDECUE, $ecue->getId(), $comparison);
        } elseif ($ecue instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NoteTableMap::COL_IDECUE, $ecue->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function joinEcue($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useEcueQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
        ?string $joinType = Criteria::LEFT_JOIN
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
     * @param   ChildNote $note Object to remove from the list of results
     *
     * @return $this|ChildNoteQuery The current query, for fluid interface
     */
    public function prune($note = null)
    {
        if ($note) {
            $this->addUsingAlias(NoteTableMap::COL_ID, $note->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the note table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NoteTableMap::clearInstancePool();
            NoteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NoteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NoteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NoteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NoteQuery
