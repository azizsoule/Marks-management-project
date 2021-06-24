<?php

namespace Map;

use \Note;
use \NoteQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'note' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class NoteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.NoteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'notes';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'note';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Note';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Note';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'note.id';

    /**
     * the column name for the idEtudiant field
     */
    const COL_IDETUDIANT = 'note.idEtudiant';

    /**
     * the column name for the idEcue field
     */
    const COL_IDECUE = 'note.idEcue';

    /**
     * the column name for the note field
     */
    const COL_NOTE = 'note.note';

    /**
     * the column name for the idBase field
     */
    const COL_IDBASE = 'note.idBase';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'note.date';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Idetudiant', 'Idecue', 'Note', 'Idbase', 'Date', ),
        self::TYPE_CAMELNAME     => array('id', 'idetudiant', 'idecue', 'note', 'idbase', 'date', ),
        self::TYPE_COLNAME       => array(NoteTableMap::COL_ID, NoteTableMap::COL_IDETUDIANT, NoteTableMap::COL_IDECUE, NoteTableMap::COL_NOTE, NoteTableMap::COL_IDBASE, NoteTableMap::COL_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'idEtudiant', 'idEcue', 'note', 'idBase', 'date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Idetudiant' => 1, 'Idecue' => 2, 'Note' => 3, 'Idbase' => 4, 'Date' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idetudiant' => 1, 'idecue' => 2, 'note' => 3, 'idbase' => 4, 'date' => 5, ),
        self::TYPE_COLNAME       => array(NoteTableMap::COL_ID => 0, NoteTableMap::COL_IDETUDIANT => 1, NoteTableMap::COL_IDECUE => 2, NoteTableMap::COL_NOTE => 3, NoteTableMap::COL_IDBASE => 4, NoteTableMap::COL_DATE => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'idEtudiant' => 1, 'idEcue' => 2, 'note' => 3, 'idBase' => 4, 'date' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Note.Id' => 'ID',
        'id' => 'ID',
        'note.id' => 'ID',
        'NoteTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Idetudiant' => 'IDETUDIANT',
        'Note.Idetudiant' => 'IDETUDIANT',
        'idetudiant' => 'IDETUDIANT',
        'note.idetudiant' => 'IDETUDIANT',
        'NoteTableMap::COL_IDETUDIANT' => 'IDETUDIANT',
        'COL_IDETUDIANT' => 'IDETUDIANT',
        'idEtudiant' => 'IDETUDIANT',
        'note.idEtudiant' => 'IDETUDIANT',
        'Idecue' => 'IDECUE',
        'Note.Idecue' => 'IDECUE',
        'idecue' => 'IDECUE',
        'note.idecue' => 'IDECUE',
        'NoteTableMap::COL_IDECUE' => 'IDECUE',
        'COL_IDECUE' => 'IDECUE',
        'idEcue' => 'IDECUE',
        'note.idEcue' => 'IDECUE',
        'Note' => 'NOTE',
        'Note.Note' => 'NOTE',
        'note' => 'NOTE',
        'note.note' => 'NOTE',
        'NoteTableMap::COL_NOTE' => 'NOTE',
        'COL_NOTE' => 'NOTE',
        'Idbase' => 'IDBASE',
        'Note.Idbase' => 'IDBASE',
        'idbase' => 'IDBASE',
        'note.idbase' => 'IDBASE',
        'NoteTableMap::COL_IDBASE' => 'IDBASE',
        'COL_IDBASE' => 'IDBASE',
        'idBase' => 'IDBASE',
        'note.idBase' => 'IDBASE',
        'Date' => 'DATE',
        'Note.Date' => 'DATE',
        'date' => 'DATE',
        'note.date' => 'DATE',
        'NoteTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('note');
        $this->setPhpName('Note');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Note');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('idEtudiant', 'Idetudiant', 'INTEGER', 'etudiant', 'id', true, null, null);
        $this->addForeignKey('idEcue', 'Idecue', 'INTEGER', 'ecue', 'id', false, null, null);
        $this->addColumn('note', 'Note', 'INTEGER', true, null, null);
        $this->addForeignKey('idBase', 'Idbase', 'INTEGER', 'base', 'id', true, null, null);
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Base', '\\Base', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idBase',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Etudiant', '\\Etudiant', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idEtudiant',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Ecue', '\\Ecue', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idEcue',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? NoteTableMap::CLASS_DEFAULT : NoteTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Note object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = NoteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NoteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NoteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NoteTableMap::OM_CLASS;
            /** @var Note $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NoteTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = NoteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NoteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Note $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NoteTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(NoteTableMap::COL_ID);
            $criteria->addSelectColumn(NoteTableMap::COL_IDETUDIANT);
            $criteria->addSelectColumn(NoteTableMap::COL_IDECUE);
            $criteria->addSelectColumn(NoteTableMap::COL_NOTE);
            $criteria->addSelectColumn(NoteTableMap::COL_IDBASE);
            $criteria->addSelectColumn(NoteTableMap::COL_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.idEtudiant');
            $criteria->addSelectColumn($alias . '.idEcue');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.idBase');
            $criteria->addSelectColumn($alias . '.date');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(NoteTableMap::COL_ID);
            $criteria->removeSelectColumn(NoteTableMap::COL_IDETUDIANT);
            $criteria->removeSelectColumn(NoteTableMap::COL_IDECUE);
            $criteria->removeSelectColumn(NoteTableMap::COL_NOTE);
            $criteria->removeSelectColumn(NoteTableMap::COL_IDBASE);
            $criteria->removeSelectColumn(NoteTableMap::COL_DATE);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.idEtudiant');
            $criteria->removeSelectColumn($alias . '.idEcue');
            $criteria->removeSelectColumn($alias . '.note');
            $criteria->removeSelectColumn($alias . '.idBase');
            $criteria->removeSelectColumn($alias . '.date');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(NoteTableMap::DATABASE_NAME)->getTable(NoteTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Note or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Note object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Note) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NoteTableMap::DATABASE_NAME);
            $criteria->add(NoteTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = NoteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NoteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NoteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the note table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return NoteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Note or Criteria object.
     *
     * @param mixed               $criteria Criteria or Note object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NoteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Note object
        }

        if ($criteria->containsKey(NoteTableMap::COL_ID) && $criteria->keyContainsValue(NoteTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NoteTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = NoteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // NoteTableMap
