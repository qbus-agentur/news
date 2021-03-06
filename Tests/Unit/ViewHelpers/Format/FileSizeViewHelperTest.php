<?php

namespace GeorgRinger\News\Tests\Unit\ViewHelpers\Format;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use GeorgRinger\News\ViewHelpers\Format\FileSizeViewHelper;

/**
 * Tests for FileSizeViewHelper
 *
 */
class FileSizeViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * Test if default file format works
	 *
	 * @test
	 * @return void
	 */
	public function viewHelperReturnsFileSizeWithDefaultFormat() {
		$viewHelper = new FileSizeViewHelper();
		$actualResult = $viewHelper->render(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('news', 'Tests/Unit/ViewHelpers/Format/') . 'dummy.txt');
		$this->assertEquals('14.35 Ki', $actualResult);
	}

	/**
	 * Test if given format works
	 *
	 * @test
	 * @return void
	 */
	public function viewHelperReturnsFileSizeWithGivenFormat() {
		$viewHelper = new FileSizeViewHelper();
		$actualResult = $viewHelper->render(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('news', 'Tests/Unit/ViewHelpers/Format/') . 'dummy.txt', '| A| B| C');
		$this->assertEquals('14.35 A', $actualResult);
	}

	/**
	 * Test if exception handling works
	 *
	 * @test
	 * @expectedException \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
	 * @return void
	 */
	public function viewHelperThrowsExceptionIfFileNotFound() {
		$viewHelper = new FileSizeViewHelper();
		$viewHelper->render('fo', 'bar');
	}

}
