<?php

/**
 * @author MCPE_PC <maxpjh0528@naver.com>
 *    This file is part of ItemFrameProtector.
 *
 *    ItemFrameProtector is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU Lesser General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    ItemFrameProtector is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU Lesser General Public License for more details.
 *
 *    You should have received a copy of the GNU Lesser General Public License
 *    along with ItemFrameProtector.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace mcpepc\ItemFrameProtector;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\ItemFrame;

class ItemFrameProtector extends PluginBase implements Listener {
	function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	/**
	 * @priority LOW
	 * @ignoreCancelled
	 */
	function onClick(PlayerInteractEvent $event): void {
		$block = $event->getBlock();
		if ($block->getLevel()->getTile($block) instanceof ItemFrame && !$event->getPlayer()->hasPermission('itemframeprotector.bypass')) {
			$event->setCancelled();
		}
	}
}
