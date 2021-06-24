<?php

namespace Map;

use \Admin;
use \AdminQuery;
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
 * This class defines the structure of the 'admin' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AdminTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AdminTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'notes';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'admin';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Admin';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Admin';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'admin.id';

    /**
     * the column name for the nom field
     */
    const COL_NOM = 'admin.nom';

    /**
     * the column name for the prénoms field
     */
    const COL_PRéNOMS = 'admin.prénoms';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'admin.email';

    /**
     * the column name for the contact field
     */
    const COL_CONTACT = 'admin.contact';

    /**
     * the column name for the idGenre field
     */
    const COL_IDGENRE = 'admin.idGenre';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'admin.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'admin.password';

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
        self::TYPE_PHPNAME       => array('Id', 'Nom', 'Prénoms', 'Email', 'Contact', 'Idgenre', 'Username', 'Password', ),
        self::TYPE_CAMELNAME     => array('id', 'nom', 'prénoms', 'email', 'contact', 'idgenre', 'username', 'password', ),
        self::TYPE_COLNAME       => array(AdminTableMap::COL_ID, AdminTableMap::COL_NOM, AdminTableMap::COL_PRéNOMS, AdminTableMap::COL_EMAIL, AdminTableMap::COL_CONTACT, AdminTableMap::COL_IDGENRE, AdminTableMap::COL_USERNAME, AdminTableMap::COL_PASSWORD, ),
        self::TYPE_FIELDNAME     => array('id', 'nom', 'prénoms', 'email', 'contact', 'idGenre', 'username', 'password', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nom' => 1, 'Prénoms' => 2, 'Email' => 3, 'Contact' => 4, 'Idgenre' => 5, 'Username' => 6, 'Password' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nom' => 1, 'prénoms' => 2, 'email' => 3, 'contact' => 4, 'idgenre' => 5, 'username' => 6, 'password' => 7, ),
        self::TYPE_COLNAME       => array(AdminTableMap::COL_ID => 0, AdminTableMap::COL_NOM => 1, AdminTableMap::COL_PRéNOMS => 2, AdminTableMap::COL_EMAIL => 3, AdminTableMap::COL_CONTACT => 4, AdminTableMap::COL_IDGENRE => 5, AdminTableMap::COL_USERNAME => 6, AdminTableMap::COL_PASSWORD => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nom' => 1, 'prénoms' => 2, 'email' => 3, 'contact' => 4, 'idGenre' => 5, 'username' => 6, 'password' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Admin.Id' => 'ID',
        'id' => 'ID',
        'admin.id' => 'ID',
        'AdminTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Nom' => 'NOM',
        'Admin.Nom' => 'NOM',
        'nom' => 'NOM',
        'admin.nom' => 'NOM',
        'AdminTableMap::COL_NOM' => 'NOM',
        'COL_NOM' => 'NOM',
        'Prénoms' => 'PRéNOMS',
        'Admin.Prénoms' => 'PRéNOMS',
        'prénoms' => 'PRéNOMS',
        'admin.prénoms' => 'PRéNOMS',
        'AdminTableMap::COL_PRéNOMS' => 'PRéNOMS',
        'COL_PRéNOMS' => 'PRéNOMS',
        'Email' => 'EMAIL',
        'Admin.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'admin.email' => 'EMAIL',
        'AdminTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Contact' => 'CONTACT',
        'Admin.Contact' => 'CONTACT',
        'contact' => 'CONTACT',
        'admin.contact' => 'CONTACT',
        'AdminTableMap::COL_CONTACT' => 'CONTACT',
        'COL_CONTACT' => 'CONTACT',
        'Idgenre' => 'IDGENRE',
        'Admin.Idgenre' => 'IDGENRE',
        'idgenre' => 'IDGENRE',
        'admin.idgenre' => 'IDGENRE',
        'AdminTableMap::COL_IDGENRE' => 'IDGENRE',
        'COL_IDGENRE' => 'IDGENRE',
        'idGenre' => 'IDGENRE',
        'admin.idGenre' => 'IDGENRE',
        'Username' => 'USERNAME',
        'Admin.Username' => 'USERNAME',
        'username' => 'USERNAME',
        'admin.username' => 'USERNAME',
        'AdminTableMap::COL_USERNAME' => 'USERNAME',
        'COL_USERNAME' => 'USERNAME',
        'Password' => 'PASSWORD',
        'Admin.Password' => 'PASSWORD',
        'password' => 'PASSWORD',
        'admin.password' => 'PASSWORD',
        'AdminTableMap::COL_PASSWORD' => 'PASSWORD',
        'COL_PASSWORD' => 'PASSWORD',
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
        $this->setName('admin');
        $this->setPhpName('Admin');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Admin');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nom', 'Nom', 'VARCHAR', false, 20, null);
        $this->addColumn('prénoms', 'Prénoms', 'VARCHAR', false, 100, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('contact', 'Contact', 'VARCHAR', false, 20, null);
        $this->addForeignKey('idGenre', 'Idgenre', 'INTEGER', 'genre', 'id', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 10, null);
        $this->addColumn('password', 'Password', 'LONGVARCHAR', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Genre', '\\Genre', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idGenre',
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
        return $withPrefix ? AdminTableMap::CLASS_DEFAULT : AdminTableMap::OM_CLASS;
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
     * @return array           (Admin object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AdminTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdminTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdminTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdminTableMap::OM_CLASS;
            /** @var Admin $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdminTableMap::addInstanceToPool($obj, $key);
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
            $key = AdminTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdminTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Admin $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdminTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AdminTableMap::COL_ID);
            $criteria->addSelectColumn(AdminTableMap::COL_NOM);
            $criteria->addSelectColumn(AdminTableMap::COL_PRéNOMS);
            $criteria->addSelectColumn(AdminTableMap::COL_EMAIL);
            $criteria->addSelectColumn(AdminTableMap::COL_CONTACT);
            $criteria->addSelectColumn(AdminTableMap::COL_IDGENRE);
            $criteria->addSelectColumn(AdminTableMap::COL_USERNAME);
            $criteria->addSelectColumn(AdminTableMap::COL_PASSWORD);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nom');
            $criteria->addSelectColumn($alias . '.prénoms');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.idGenre');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
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
            $criteria->removeSelectColumn(AdminTableMap::COL_ID);
            $criteria->removeSelectColumn(AdminTableMap::COL_NOM);
            $criteria->removeSelectColumn(AdminTableMap::COL_PRéNOMS);
            $criteria->removeSelectColumn(AdminTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(AdminTableMap::COL_CONTACT);
            $criteria->removeSelectColumn(AdminTableMap::COL_IDGENRE);
            $criteria->removeSelectColumn(AdminTableMap::COL_USERNAME);
            $criteria->removeSelectColumn(AdminTableMap::COL_PASSWORD);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.nom');
            $criteria->removeSelectColumn($alias . '.prénoms');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.contact');
            $criteria->removeSelectColumn($alias . '.idGenre');
            $criteria->removeSelectColumn($alias . '.username');
            $criteria->removeSelectColumn($alias . '.password');
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
        return Propel::getServiceContainer()->getDatabaseMap(AdminTableMap::DATABASE_NAME)->getTable(AdminTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Admin or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Admin object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Admin) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdminTableMap::DATABASE_NAME);
            $criteria->add(AdminTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AdminQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdminTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdminTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the admin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AdminQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Admin or Criteria object.
     *
     * @param mixed               $criteria Criteria or Admin object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Admin object
        }

        if ($criteria->containsKey(AdminTableMap::COL_ID) && $criteria->keyContainsValue(AdminTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AdminQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AdminTableMap
