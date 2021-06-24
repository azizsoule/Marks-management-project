<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'notes' => 
  array (
    0 => '\\Map\\AdminTableMap',
    1 => '\\Map\\BaseTableMap',
    2 => '\\Map\\EcueTableMap',
    3 => '\\Map\\EtudiantTableMap',
    4 => '\\Map\\GenreTableMap',
    5 => '\\Map\\NiveauTableMap',
    6 => '\\Map\\NoteTableMap',
    7 => '\\Map\\UeTableMap',
  ),
));
