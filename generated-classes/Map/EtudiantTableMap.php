<?php

namespace Map;

use \Etudiant;
use \EtudiantQuery;
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
 * This class defines the structure of the 'etudiant' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class EtudiantTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EtudiantTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'notes';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'etudiant';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Etudiant';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Etudiant';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'etudiant.id';

    /**
     * the column name for the nom field
     */
    const COL_NOM = 'etudiant.nom';

    /**
     * the column name for the prenoms field
     */
    const COL_PRENOMS = 'etudiant.prenoms';

    /**
     * the column name for the dateNaissance field
     */
    const COL_DATENAISSANCE = 'etudiant.dateNaissance';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'etudiant.email';

    /**
     * the column name for the contact field
     */
    const COL_CONTACT = 'etudiant.contact';

    /**
     * the column name for the dateAjout field
     */
    const COL_DATEAJOUT = 'etudiant.dateAjout';

    /**
     * the column name for the idNiveau field
     */
    const COL_IDNIVEAU = 'etudiant.idNiveau';

    /**
     * the column name for the idGenre field
     */
    const COL_IDGENRE = 'etudiant.idGenre';

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
        self::TYPE_PHPNAME       => array('Id', 'Nom', 'Prenoms', 'Datenaissance', 'Email', 'Contact', 'Dateajout', 'Idniveau', 'Idgenre', ),
        self::TYPE_CAMELNAME     => array('id', 'nom', 'prenoms', 'datenaissance', 'email', 'contact', 'dateajout', 'idniveau', 'idgenre', ),
        self::TYPE_COLNAME       => array(EtudiantTableMap::COL_ID, EtudiantTableMap::COL_NOM, EtudiantTableMap::COL_PRENOMS, EtudiantTableMap::COL_DATENAISSANCE, EtudiantTableMap::COL_EMAIL, EtudiantTableMap::COL_CONTACT, EtudiantTableMap::COL_DATEAJOUT, EtudiantTableMap::COL_IDNIVEAU, EtudiantTableMap::COL_IDGENRE, ),
        self::TYPE_FIELDNAME     => array('id', 'nom', 'prenoms', 'dateNaissance', 'email', 'contact', 'dateAjout', 'idNiveau', 'idGenre', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nom' => 1, 'Prenoms' => 2, 'Datenaissance' => 3, 'Email' => 4, 'Contact' => 5, 'Dateajout' => 6, 'Idniveau' => 7, 'Idgenre' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nom' => 1, 'prenoms' => 2, 'datenaissance' => 3, 'email' => 4, 'contact' => 5, 'dateajout' => 6, 'idniveau' => 7, 'idgenre' => 8, ),
        self::TYPE_COLNAME       => array(EtudiantTableMap::COL_ID => 0, EtudiantTableMap::COL_NOM => 1, EtudiantTableMap::COL_PRENOMS => 2, EtudiantTableMap::COL_DATENAISSANCE => 3, EtudiantTableMap::COL_EMAIL => 4, EtudiantTableMap::COL_CONTACT => 5, EtudiantTableMap::COL_DATEAJOUT => 6, EtudiantTableMap::COL_IDNIVEAU => 7, EtudiantTableMap::COL_IDGENRE => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nom' => 1, 'prenoms' => 2, 'dateNaissance' => 3, 'email' => 4, 'contact' => 5, 'dateAjout' => 6, 'idNiveau' => 7, 'idGenre' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Etudiant.Id' => 'ID',
        'id' => 'ID',
        'etudiant.id' => 'ID',
        'EtudiantTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Nom' => 'NOM',
        'Etudiant.Nom' => 'NOM',
        'nom' => 'NOM',
        'etudiant.nom' => 'NOM',
        'EtudiantTableMap::COL_NOM' => 'NOM',
        'COL_NOM' => 'NOM',
        'Prenoms' => 'PRENOMS',
        'Etudiant.Prenoms' => 'PRENOMS',
        'prenoms' => 'PRENOMS',
        'etudiant.prenoms' => 'PRENOMS',
        'EtudiantTableMap::COL_PRENOMS' => 'PRENOMS',
        'COL_PRENOMS' => 'PRENOMS',
        'Datenaissance' => 'DATENAISSANCE',
        'Etudiant.Datenaissance' => 'DATENAISSANCE',
        'datenaissance' => 'DATENAISSANCE',
        'etudiant.datenaissance' => 'DATENAISSANCE',
        'EtudiantTableMap::COL_DATENAISSANCE' => 'DATENAISSANCE',
        'COL_DATENAISSANCE' => 'DATENAISSANCE',
        'dateNaissance' => 'DATENAISSANCE',
        'etudiant.dateNaissance' => 'DATENAISSANCE',
        'Email' => 'EMAIL',
        'Etudiant.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'etudiant.email' => 'EMAIL',
        'EtudiantTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Contact' => 'CONTACT',
        'Etudiant.Contact' => 'CONTACT',
        'contact' => 'CONTACT',
        'etudiant.contact' => 'CONTACT',
        'EtudiantTableMap::COL_CONTACT' => 'CONTACT',
        'COL_CONTACT' => 'CONTACT',
        'Dateajout' => 'DATEAJOUT',
        'Etudiant.Dateajout' => 'DATEAJOUT',
        'dateajout' => 'DATEAJOUT',
        'etudiant.dateajout' => 'DATEAJOUT',
        'EtudiantTableMap::COL_DATEAJOUT' => 'DATEAJOUT',
        'COL_DATEAJOUT' => 'DATEAJOUT',
        'dateAjout' => 'DATEAJOUT',
        'etudiant.dateAjout' => 'DATEAJOUT',
        'Idniveau' => 'IDNIVEAU',
        'Etudiant.Idniveau' => 'IDNIVEAU',
        'idniveau' => 'IDNIVEAU',
        'etudiant.idniveau' => 'IDNIVEAU',
        'EtudiantTableMap::COL_IDNIVEAU' => 'IDNIVEAU',
        'COL_IDNIVEAU' => 'IDNIVEAU',
        'idNiveau' => 'IDNIVEAU',
        'etudiant.idNiveau' => 'IDNIVEAU',
        'Idgenre' => 'IDGENRE',
        'Etudiant.Idgenre' => 'IDGENRE',
        'idgenre' => 'IDGENRE',
        'etudiant.idgenre' => 'IDGENRE',
        'EtudiantTableMap::COL_IDGENRE' => 'IDGENRE',
        'COL_IDGENRE' => 'IDGENRE',
        'idGenre' => 'IDGENRE',
        'etudiant.idGenre' => 'IDGENRE',
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
        $this->setName('etudiant');
        $this->setPhpName('Etudiant');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Etudiant');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nom', 'Nom', 'VARCHAR', false, 20, null);
        $this->addColumn('prenoms', 'Prenoms', 'VARCHAR', false, 100, null);
        $this->addColumn('dateNaissance', 'Datenaissance', 'DATE', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('contact', 'Contact', 'VARCHAR', false, 50, null);
        $this->addColumn('dateAjout', 'Dateajout', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('idNiveau', 'Idniveau', 'INTEGER', 'niveau', 'id', true, null, null);
        $this->addForeignKey('idGenre', 'Idgenre', 'INTEGER', 'genre', 'id', true, null, null);
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
        $this->addRelation('Genre', '\\Genre', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idGenre',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Note', '\\Note', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idEtudiant',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', 'Notes', false);
    } // buildRelations()

    /**
     * Method to invalidate the instance pool of all tables related to etudiant     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        NoteTableMap::clearInstancePool();
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
        return $withPrefix ? EtudiantTableMap::CLASS_DEFAULT : EtudiantTableMap::OM_CLASS;
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
     * @return array           (Etudiant object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EtudiantTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EtudiantTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EtudiantTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EtudiantTableMap::OM_CLASS;
            /** @var Etudiant $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EtudiantTableMap::addInstanceToPool($obj, $key);
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
            $key = EtudiantTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EtudiantTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Etudiant $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EtudiantTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EtudiantTableMap::COL_ID);
            $criteria->addSelectColumn(EtudiantTableMap::COL_NOM);
            $criteria->addSelectColumn(EtudiantTableMap::COL_PRENOMS);
            $criteria->addSelectColumn(EtudiantTableMap::COL_DATENAISSANCE);
            $criteria->addSelectColumn(EtudiantTableMap::COL_EMAIL);
            $criteria->addSelectColumn(EtudiantTableMap::COL_CONTACT);
            $criteria->addSelectColumn(EtudiantTableMap::COL_DATEAJOUT);
            $criteria->addSelectColumn(EtudiantTableMap::COL_IDNIVEAU);
            $criteria->addSelectColumn(EtudiantTableMap::COL_IDGENRE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nom');
            $criteria->addSelectColumn($alias . '.prenoms');
            $criteria->addSelectColumn($alias . '.dateNaissance');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.dateAjout');
            $criteria->addSelectColumn($alias . '.idNiveau');
            $criteria->addSelectColumn($alias . '.idGenre');
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
            $criteria->removeSelectColumn(EtudiantTableMap::COL_ID);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_NOM);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_PRENOMS);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_DATENAISSANCE);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_CONTACT);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_DATEAJOUT);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_IDNIVEAU);
            $criteria->removeSelectColumn(EtudiantTableMap::COL_IDGENRE);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.nom');
            $criteria->removeSelectColumn($alias . '.prenoms');
            $criteria->removeSelectColumn($alias . '.dateNaissance');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.contact');
            $criteria->removeSelectColumn($alias . '.dateAjout');
            $criteria->removeSelectColumn($alias . '.idNiveau');
            $criteria->removeSelectColumn($alias . '.idGenre');
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
        return Propel::getServiceContainer()->getDatabaseMap(EtudiantTableMap::DATABASE_NAME)->getTable(EtudiantTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Etudiant or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Etudiant object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EtudiantTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Etudiant) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EtudiantTableMap::DATABASE_NAME);
            $criteria->add(EtudiantTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = EtudiantQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EtudiantTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EtudiantTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the etudiant table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EtudiantQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Etudiant or Criteria object.
     *
     * @param mixed               $criteria Criteria or Etudiant object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EtudiantTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Etudiant object
        }

        if ($criteria->containsKey(EtudiantTableMap::COL_ID) && $criteria->keyContainsValue(EtudiantTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.EtudiantTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = EtudiantQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EtudiantTableMap
