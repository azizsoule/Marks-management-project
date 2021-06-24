<?php

namespace Map;

use \Ue;
use \UeQuery;
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
 * This class defines the structure of the 'ue' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'notes';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ue';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Ue';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Ue';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ue.id';

    /**
     * the column name for the libelle field
     */
    const COL_LIBELLE = 'ue.libelle';

    /**
     * the column name for the hasEcue field
     */
    const COL_HASECUE = 'ue.hasEcue';

    /**
     * the column name for the idNiveau field
     */
    const COL_IDNIVEAU = 'ue.idNiveau';

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
        self::TYPE_PHPNAME       => array('Id', 'Libelle', 'Hasecue', 'Idniveau', ),
        self::TYPE_CAMELNAME     => array('id', 'libelle', 'hasecue', 'idniveau', ),
        self::TYPE_COLNAME       => array(UeTableMap::COL_ID, UeTableMap::COL_LIBELLE, UeTableMap::COL_HASECUE, UeTableMap::COL_IDNIVEAU, ),
        self::TYPE_FIELDNAME     => array('id', 'libelle', 'hasEcue', 'idNiveau', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Libelle' => 1, 'Hasecue' => 2, 'Idniveau' => 3, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'libelle' => 1, 'hasecue' => 2, 'idniveau' => 3, ),
        self::TYPE_COLNAME       => array(UeTableMap::COL_ID => 0, UeTableMap::COL_LIBELLE => 1, UeTableMap::COL_HASECUE => 2, UeTableMap::COL_IDNIVEAU => 3, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'libelle' => 1, 'hasEcue' => 2, 'idNiveau' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Ue.Id' => 'ID',
        'id' => 'ID',
        'ue.id' => 'ID',
        'UeTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Libelle' => 'LIBELLE',
        'Ue.Libelle' => 'LIBELLE',
        'libelle' => 'LIBELLE',
        'ue.libelle' => 'LIBELLE',
        'UeTableMap::COL_LIBELLE' => 'LIBELLE',
        'COL_LIBELLE' => 'LIBELLE',
        'Hasecue' => 'HASECUE',
        'Ue.Hasecue' => 'HASECUE',
        'hasecue' => 'HASECUE',
        'ue.hasecue' => 'HASECUE',
        'UeTableMap::COL_HASECUE' => 'HASECUE',
        'COL_HASECUE' => 'HASECUE',
        'hasEcue' => 'HASECUE',
        'ue.hasEcue' => 'HASECUE',
        'Idniveau' => 'IDNIVEAU',
        'Ue.Idniveau' => 'IDNIVEAU',
        'idniveau' => 'IDNIVEAU',
        'ue.idniveau' => 'IDNIVEAU',
        'UeTableMap::COL_IDNIVEAU' => 'IDNIVEAU',
        'COL_IDNIVEAU' => 'IDNIVEAU',
        'idNiveau' => 'IDNIVEAU',
        'ue.idNiveau' => 'IDNIVEAU',
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
        $this->setName('ue');
        $this->setPhpName('Ue');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ue');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('libelle', 'Libelle', 'VARCHAR', true, 50, null);
        $this->addColumn('hasEcue', 'Hasecue', 'BOOLEAN', true, 1, null);
        $this->addForeignKey('idNiveau', 'Idniveau', 'INTEGER', 'niveau', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Niveau', '\\Niveau', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idNiveau',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Ecue', '\\Ecue', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idUe',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'Ecues', false);
    } // buildRelations()

    /**
     * Method to invalidate the instance pool of all tables related to ue     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        EcueTableMap::clearInstancePool();
    }

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
        return $withPrefix ? UeTableMap::CLASS_DEFAULT : UeTableMap::OM_CLASS;
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
     * @return array           (Ue object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UeTableMap::OM_CLASS;
            /** @var Ue $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UeTableMap::addInstanceToPool($obj, $key);
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
            $key = UeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Ue $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UeTableMap::COL_ID);
            $criteria->addSelectColumn(UeTableMap::COL_LIBELLE);
            $criteria->addSelectColumn(UeTableMap::COL_HASECUE);
            $criteria->addSelectColumn(UeTableMap::COL_IDNIVEAU);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.libelle');
            $criteria->addSelectColumn($alias . '.hasEcue');
            $criteria->addSelectColumn($alias . '.idNiveau');
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
            $criteria->removeSelectColumn(UeTableMap::COL_ID);
            $criteria->removeSelectColumn(UeTableMap::COL_LIBELLE);
            $criteria->removeSelectColumn(UeTableMap::COL_HASECUE);
            $criteria->removeSelectColumn(UeTableMap::COL_IDNIVEAU);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.libelle');
            $criteria->removeSelectColumn($alias . '.hasEcue');
            $criteria->removeSelectColumn($alias . '.idNiveau');
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
        return Propel::getServiceContainer()->getDatabaseMap(UeTableMap::DATABASE_NAME)->getTable(UeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Ue or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Ue object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ue) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UeTableMap::DATABASE_NAME);
            $criteria->add(UeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ue table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Ue or Criteria object.
     *
     * @param mixed               $criteria Criteria or Ue object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Ue object
        }

        if ($criteria->containsKey(UeTableMap::COL_ID) && $criteria->keyContainsValue(UeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UeTableMap
