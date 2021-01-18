<?php

namespace php\persistence\dao;

use php\persistence\entities\Equipment;

/**
 *
 * @author JPD
 */
interface IEquipmentDao {

	/**
	 * Función que devuelve un Equipamiento por su ID
	 *
	 * @param int $id
	 * @return Equipment
	 */
	public function getEquipmentyById (int $id): Equipment;

	/**
	 * Función que indica si existe un equipamiento con un determinado ID y está
	 * o no activo en la web
	 *
	 * @param int $id
	 * @param bool $active
	 * @return Bool
	 */
	public function isExistEquipmentById (int $id, bool $active): Bool;

	/**
	 * Función que lista las tallas de equipamiento
	 *
	 * @return \ArrayObject
	 */
	public function listEquipmentSize (): \ArrayObject;

	/**
	 * Función que lista los tipos de equipamiento
	 *
	 * @return \ArrayObject
	 */
	public function listEquipmentType (): \ArrayObject;

	/**
	 * Función que lista los tipos de equipamiento por categoría
	 *
	 * @param int $category
	 * @return \ArrayObject
	 */
	public function listEquipmentTypeByCategory (int $category): \ArrayObject;

	/**
	 * Función que añade un nuevo equipamiento en la base de datos
	 *
	 * @param int $id
	 * @param Equipment $equipment
	 * @param int $userId
	 */
	public function newEquipment (int $id, Equipment $equipment, int $userId): void;
}

?>