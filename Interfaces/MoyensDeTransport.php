<?php

namespace POOExos\Interfaces;

/**
 * Interface définissant un moyen de transport
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */



interface MoyensDeTransport{

	/**
	 * Accélère la vitesse du moyen de transport
	 *
	 */
	public function accelerer();

	/**
	 * Réduit la vitesse du moyen de transport
	 *
	 */
	public function freiner();

}