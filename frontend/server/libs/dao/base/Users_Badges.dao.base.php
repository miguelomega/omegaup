<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** UsersBadges Data Access Object (DAO) Base.
 *
 * Esta clase contiene toda la manipulacion de bases de datos que se necesita para
 * almacenar de forma permanente y recuperar instancias de objetos {@link UsersBadges }.
 * @access public
 * @abstract
 *
 */
abstract class UsersBadgesDAOBase extends DAO {
    /**
     * Campos de la tabla.
     */
    const FIELDS = '`Users_Badges`.`badge_id`, `Users_Badges`.`user_id`, `Users_Badges`.`time`, `Users_Badges`.`last_problem_id`';

    /**
     * Guardar registros.
     *
     * Este metodo guarda el estado actual del objeto {@link UsersBadges} pasado en la base de datos. La llave
     * primaria indicara que instancia va a ser actualizado en base de datos. Si la llave primara o combinacion de llaves
     * primarias describen una fila que no se encuentra en la base de datos, entonces save() creara una nueva fila, insertando
     * en ese objeto el ID recien creado.
     *
     * @static
     * @throws Exception si la operacion fallo.
     * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges
     * @return Un entero mayor o igual a cero denotando las filas afectadas.
     */
    final public static function save(UsersBadges $Users_Badges) {
        if (!is_null(self::getByPK($Users_Badges->badge_id, $Users_Badges->user_id))) {
            return UsersBadgesDAOBase::update($Users_Badges);
        } else {
            return UsersBadgesDAOBase::create($Users_Badges);
        }
    }

    /**
     * Obtener {@link UsersBadges} por llave primaria.
     *
     * Este metodo cargara un objeto {@link UsersBadges} de la base de datos
     * usando sus llaves primarias.
     *
     * @static
     * @return @link UsersBadges Un objeto del tipo {@link UsersBadges}. NULL si no hay tal registro.
     */
    final public static function getByPK($badge_id, $user_id) {
        if (is_null($badge_id) || is_null($user_id)) {
            return null;
        }
        $sql = 'SELECT `Users_Badges`.`badge_id`, `Users_Badges`.`user_id`, `Users_Badges`.`time`, `Users_Badges`.`last_problem_id` FROM Users_Badges WHERE (badge_id = ? AND user_id = ?) LIMIT 1;';
        $params = [$badge_id, $user_id];
        global $conn;
        $rs = $conn->GetRow($sql, $params);
        if (count($rs) == 0) {
            return null;
        }
        return new UsersBadges($rs);
    }

    /**
     * Obtener todas las filas.
     *
     * Esta funcion leera todos los contenidos de la tabla en la base de datos y construira
     * un vector que contiene objetos de tipo {@link UsersBadges}. Tenga en cuenta que este metodo
     * consumen enormes cantidades de recursos si la tabla tiene muchas filas.
     * Este metodo solo debe usarse cuando las tablas destino tienen solo pequenas cantidades de datos o se usan sus parametros para obtener un menor numero de filas.
     *
     * @static
     * @param $pagina Pagina a ver.
     * @param $columnas_por_pagina Columnas por pagina.
     * @param $orden Debe ser una cadena con el nombre de una columna en la base de datos.
     * @param $tipo_de_orden 'ASC' o 'DESC' el default es 'ASC'
     * @return Array Un arreglo que contiene objetos del tipo {@link UsersBadges}.
     */
    final public static function getAll($pagina = null, $columnas_por_pagina = null, $orden = null, $tipo_de_orden = 'ASC') {
        $sql = 'SELECT `Users_Badges`.`badge_id`, `Users_Badges`.`user_id`, `Users_Badges`.`time`, `Users_Badges`.`last_problem_id` from Users_Badges';
        global $conn;
        if (!is_null($orden)) {
            $sql .= ' ORDER BY `' . mysqli_real_escape_string($conn->_connectionID, $orden) . '` ' . ($tipo_de_orden == 'DESC' ? 'DESC' : 'ASC');
        }
        if (!is_null($pagina)) {
            $sql .= ' LIMIT ' . (($pagina - 1) * $columnas_por_pagina) . ', ' . (int)$columnas_por_pagina;
        }
        $rs = $conn->Execute($sql);
        $allData = [];
        foreach ($rs as $row) {
            $allData[] = new UsersBadges($row);
        }
        return $allData;
    }

    /**
      * Buscar registros.
      *
      * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link UsersBadges} de la base de datos.
      * Consiste en buscar todos los objetos que coinciden con las variables permanentes instanciadas de objeto pasado como argumento.
      * Aquellas variables que tienen valores NULL seran excluidos en busca de criterios.
      *
      * <code>
      *   // Ejemplo de uso - buscar todos los clientes que tengan limite de credito igual a 20000
      *   $cliente = new Cliente();
      *   $cliente->setLimiteCredito('20000');
      *   $resultados = ClienteDAO::search($cliente);
      *
      *   foreach ($resultados as $c){
      *       echo $c->nombre . '<br>';
      *   }
      * </code>
      * @static
      * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges
      * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
      * @param $orden 'ASC' o 'DESC' el default es 'ASC'
      */
    final public static function search($Users_Badges, $orderBy = null, $orden = 'ASC', $offset = 0, $rowcount = null, $likeColumns = null) {
        if (!($Users_Badges instanceof UsersBadges)) {
            $Users_Badges = new UsersBadges($Users_Badges);
        }

        $clauses = [];
        $params = [];
        if (!is_null($Users_Badges->badge_id)) {
            $clauses[] = '`badge_id` = ?';
            $params[] = $Users_Badges->badge_id;
        }
        if (!is_null($Users_Badges->user_id)) {
            $clauses[] = '`user_id` = ?';
            $params[] = $Users_Badges->user_id;
        }
        if (!is_null($Users_Badges->time)) {
            $clauses[] = '`time` = ?';
            $params[] = $Users_Badges->time;
        }
        if (!is_null($Users_Badges->last_problem_id)) {
            $clauses[] = '`last_problem_id` = ?';
            $params[] = $Users_Badges->last_problem_id;
        }
        global $conn;
        if (!is_null($likeColumns)) {
            foreach ($likeColumns as $column => $value) {
                $escapedValue = mysqli_real_escape_string($conn->_connectionID, $value);
                $clauses[] = "`{$column}` LIKE '%{$escapedValue}%'";
            }
        }
        if (sizeof($clauses) == 0) {
            return self::getAll();
        }
        $sql = 'SELECT `Users_Badges`.`badge_id`, `Users_Badges`.`user_id`, `Users_Badges`.`time`, `Users_Badges`.`last_problem_id` FROM `Users_Badges`';
        $sql .= ' WHERE (' . implode(' AND ', $clauses) . ')';
        if (!is_null($orderBy)) {
            $sql .= ' ORDER BY `' . mysqli_real_escape_string($conn->_connectionID, $orderBy) . '` ' . ($orden == 'DESC' ? 'DESC' : 'ASC');
        }
        // Add LIMIT offset, rowcount if rowcount is set
        if (!is_null($rowcount)) {
            $sql .= ' LIMIT '. (int)$offset . ', ' . (int)$rowcount;
        }
        $rs = $conn->Execute($sql, $params);
        $ar = [];
        foreach ($rs as $row) {
            $ar[] = new UsersBadges($row);
        }
        return $ar;
    }

    /**
      * Actualizar registros.
      *
      * @return Filas afectadas
      * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges a actualizar.
      */
    final private static function update(UsersBadges $Users_Badges) {
        $sql = 'UPDATE `Users_Badges` SET `time` = ?, `last_problem_id` = ? WHERE `badge_id` = ? AND `user_id` = ?;';
        $params = [
            $Users_Badges->time,
            $Users_Badges->last_problem_id,
            $Users_Badges->badge_id,$Users_Badges->user_id,
        ];
        global $conn;
        $conn->Execute($sql, $params);
        return $conn->Affected_Rows();
    }

    /**
     * Crear registros.
     *
     * Este metodo creara una nueva fila en la base de datos de acuerdo con los
     * contenidos del objeto UsersBadges suministrado. Asegurese
     * de que los valores para todas las columnas NOT NULL se ha especificado
     * correctamente. Despues del comando INSERT, este metodo asignara la clave
     * primaria generada en el objeto UsersBadges dentro de la misma transaccion.
     *
     * @return Un entero mayor o igual a cero identificando las filas afectadas, en caso de error, regresara una cadena con la descripcion del error
     * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges a crear.
     */
    final private static function create(UsersBadges $Users_Badges) {
        if (is_null($Users_Badges->time)) {
            $Users_Badges->time = gmdate('Y-m-d H:i:s');
        }
        $sql = 'INSERT INTO Users_Badges (`badge_id`, `user_id`, `time`, `last_problem_id`) VALUES (?, ?, ?, ?);';
        $params = [
            $Users_Badges->badge_id,
            $Users_Badges->user_id,
            $Users_Badges->time,
            $Users_Badges->last_problem_id,
        ];
        global $conn;
        $conn->Execute($sql, $params);
        $ar = $conn->Affected_Rows();
        if ($ar == 0) {
            return 0;
        }

        return $ar;
    }

    /**
     * Buscar por rango.
     *
     * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link UsersBadges} de la base de datos siempre y cuando
     * esten dentro del rango de atributos activos de dos objetos criterio de tipo {@link UsersBadges}.
     *
     * Aquellas variables que tienen valores NULL seran excluidos en la busqueda (los valores 0 y false no son tomados como NULL) .
     * No es necesario ordenar los objetos criterio, asi como tambien es posible mezclar atributos.
     * Si algun atributo solo esta especificado en solo uno de los objetos de criterio se buscara que los resultados conicidan exactamente en ese campo.
     *
     * <code>
     *   // Ejemplo de uso - buscar todos los clientes que tengan limite de credito
     *   // mayor a 2000 y menor a 5000. Y que tengan un descuento del 50%.
     *   $cr1 = new Cliente();
     *   $cr1->limite_credito = "2000";
     *   $cr1->descuento = "50";
     *
     *   $cr2 = new Cliente();
     *   $cr2->limite_credito = "5000";
     *   $resultados = ClienteDAO::byRange($cr1, $cr2);
     *
     *   foreach($resultados as $c ){
     *       echo $c->nombre . "<br>";
     *   }
     * </code>
     * @static
     * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges
     * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges
     * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
     * @param $orden 'ASC' o 'DESC' el default es 'ASC'
     */
    final public static function byRange(UsersBadges $Users_BadgesA, UsersBadges $Users_BadgesB, $orderBy = null, $orden = 'ASC') {
        $clauses = [];
        $params = [];

        $a = $Users_BadgesA->badge_id;
        $b = $Users_BadgesB->badge_id;
        if (!is_null($a) && !is_null($b)) {
            $clauses[] = '`badge_id` >= ? AND `badge_id` <= ?';
            $params[] = min($a, $b);
            $params[] = max($a, $b);
        } elseif (!is_null($a) || !is_null($b)) {
            $clauses[] = '`badge_id` = ?';
            $params[] = is_null($a) ? $b : $a;
        }

        $a = $Users_BadgesA->user_id;
        $b = $Users_BadgesB->user_id;
        if (!is_null($a) && !is_null($b)) {
            $clauses[] = '`user_id` >= ? AND `user_id` <= ?';
            $params[] = min($a, $b);
            $params[] = max($a, $b);
        } elseif (!is_null($a) || !is_null($b)) {
            $clauses[] = '`user_id` = ?';
            $params[] = is_null($a) ? $b : $a;
        }

        $a = $Users_BadgesA->time;
        $b = $Users_BadgesB->time;
        if (!is_null($a) && !is_null($b)) {
            $clauses[] = '`time` >= ? AND `time` <= ?';
            $params[] = min($a, $b);
            $params[] = max($a, $b);
        } elseif (!is_null($a) || !is_null($b)) {
            $clauses[] = '`time` = ?';
            $params[] = is_null($a) ? $b : $a;
        }

        $a = $Users_BadgesA->last_problem_id;
        $b = $Users_BadgesB->last_problem_id;
        if (!is_null($a) && !is_null($b)) {
            $clauses[] = '`last_problem_id` >= ? AND `last_problem_id` <= ?';
            $params[] = min($a, $b);
            $params[] = max($a, $b);
        } elseif (!is_null($a) || !is_null($b)) {
            $clauses[] = '`last_problem_id` = ?';
            $params[] = is_null($a) ? $b : $a;
        }

        $sql = 'SELECT * FROM `Users_Badges`';
        $sql .= ' WHERE (' . implode(' AND ', $clauses) . ')';
        if (!is_null($orderBy)) {
            $sql .= ' ORDER BY `' . $orderBy . '` ' . $orden;
        }
        global $conn;
        $rs = $conn->Execute($sql, $params);
        $ar = [];
        foreach ($rs as $row) {
            $ar[] = new UsersBadges($row);
        }
        return $ar;
    }

    /**
     * Eliminar registros.
     *
     * Este metodo eliminara la informacion de base de datos identificados por la clave primaria
     * en el objeto UsersBadges suministrado. Una vez que se ha suprimido un objeto, este no
     * puede ser restaurado llamando a save(). save() al ver que este es un objeto vacio, creara una nueva fila
     * pero el objeto resultante tendra una clave primaria diferente de la que estaba en el objeto eliminado.
     * Si no puede encontrar eliminar fila coincidente a eliminar, Exception sera lanzada.
     *
     * @throws Exception Se arroja cuando el objeto no tiene definidas sus llaves primarias.
     * @return int El numero de filas afectadas.
     * @param UsersBadges [$Users_Badges] El objeto de tipo UsersBadges a eliminar
     */
    final public static function delete(UsersBadges $Users_Badges) {
        if (is_null(self::getByPK($Users_Badges->badge_id, $Users_Badges->user_id))) {
            throw new Exception('Registro no encontrado.');
        }
        $sql = 'DELETE FROM `Users_Badges` WHERE badge_id = ? AND user_id = ?;';
        $params = [$Users_Badges->badge_id, $Users_Badges->user_id];
        global $conn;

        $conn->Execute($sql, $params);
        return $conn->Affected_Rows();
    }
}
