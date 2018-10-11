<?php namespace ILIAS\GlobalScreen\MainMenu;

use ILIAS\GlobalScreen\Identification\IdentificationInterface;
use ILIAS\UI\Implementation\Component\Legacy\Legacy;

/**
 * Interface IFactory
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
interface isEntry {

	/**
	 * @return IdentificationInterface
	 */
	public function getProviderIdentification(): IdentificationInterface;


	/**
	 * Pass a callable which can decide whether your element is visible for
	 * the current user
	 *
	 * @param callable $is_visible
	 *
	 * @return isEntry|isChild
	 */
	public function withVisibilityCallable(callable $is_visible): isEntry;


	/**
	 * @return bool
	 */
	public function isVisible(): bool;


	/**
	 * Pass a callable which can decide whether your element is in a active
	 * state (e.g. the Repository-Slate is active whenever a user is in the
	 * repository)
	 *
	 * @param callable $is_active
	 *
	 * @return isEntry|isChild
	 */
	public function withActiveCallable(callable $is_active): isEntry;


	/**
	 * @return bool
	 */
	public function isActive(): bool;


	/**
	 * Pass a callable which can decide wheter your element is available in
	 * general, e.g. return false for the Badges entry when the Badges-Service
	 * is disabled.
	 *
	 * @param callable $is_avaiable
	 *
	 * @return isEntry|isChild
	 */
	public function withAvailableCallable(callable $is_avaiable): isEntry;


	/**
	 * @return bool
	 */
	public function isAvailable(): bool;


	/**
	 * If your provider or the service which provides the entry does not allow
	 * to activate the entry (@see withAvailableCallable ), please provide the
	 * reason why. You can pass e Legacy Component for the moment, in most cases
	 * this will be something like in
	 * Services/Administration/templates/default/tpl.external_settings.html
	 *
	 * @param Legacy $element
	 *
	 * @return isEntry
	 */
	public function withNonAvailableReason(Legacy $element): isEntry;


	/**
	 * @return Legacy
	 */
	public function getNonAvailableReason(): Legacy;
}