<?php

namespace view{
	
	class TableView extends View{

		protected function showTable(){
			$tableRows = '';
			$arrayData = $this->data['data'];
			$tableRowsCount = count($arrayData);
			if ($tableRowsCount > 3) {
				// $pageNumber = (isset($_GET['page'])) ? $_GET['page'] : 1;
				if (isset($this->data['page'])){
					$pageNumber = $this->data['page'];
				}
				elseif (isset($_GET['page'])){
					$pageNumber = $_GET['page'];
				}
				else {
					$pageNumber = 1;
				}
				$pagesCount = ceil($tableRowsCount/3);
				if ( ($pageNumber > $pagesCount) || ($pageNumber == 1) ) {
					$start = 0;
				}
				else $start = (($pageNumber - 1) * 3);
				$end = $start + 3;
				if ($tableRowsCount < $end) $end = $tableRowsCount;
			}
			else {
				$start = 0;
				$end = $tableRowsCount;
			}

			for ($n = $start; $n < $end; $n++){
				$sr['USER-NAME'] = $arrayData[$n]['user_name'];
				$sr['USER-EMAIL'] = $arrayData[$n]['user_email'];
				$sr['USER-TASK'] = $arrayData[$n]['user_task'];
				$sr['CELL-STATUS'] = $this->getTableCellStatus($arrayData[$n]);
				$tableRows .= $this->getReplaceContent($sr, "tpl/table-row.tpl");
			}

			$sr['TABLE-ROWS'] = $tableRows;
			$sr['PAGINATION'] = $this->getPagination($tableRowsCount);
			$sr['PAGENUMBER'] = $pageNumber;
			
			return $this->getReplaceContent($sr, "tpl/table.tpl");
		}
		
		protected function getPagination($tableRowsCount){
			if ($tableRowsCount <= 3) return '';
			$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$pagesCount = ceil($tableRowsCount/3);
			$pages = '';
			for ($n = 1; $n <= $pagesCount; $n++){
				$sr['PAGE-NUMBER'] = $n;
				$sr['ACTIVE'] = ($n == $page) ? 'page-link-active' : '';

				$pages .= $this->getReplaceContent($sr, "tpl/pagination-page.tpl");
			}
			$sr['PAGES'] = $pages;
			return $this->getReplaceContent($sr, "tpl/pagination.tpl");
		}
      
      protected function getTableCellStatus($dataTableRow){
			if ($this->isAuth) {
				$sr['ID'] = $dataTableRow['id'];
				$result = '';
				if ($dataTableRow['task_done']) {
					$sr['CHECKED'] = 'checked';
				}
				$result = $this->getReplaceContent($sr, 'tpl/table-cell-status-done-auth.tpl');
				if ($dataTableRow['task_edited'] !== NULL) {
					$sr['DATE'] = date('d.m.y', $dataTableRow['task_edited']);
					$sr['TIME'] = date('H:i', $dataTableRow['task_edited']);
					$result .= $this->getReplaceContent($sr, 'tpl/table-cell-status-auth.tpl');
				}
				$result .= $this->getReplaceContent($sr, 'tpl/table-cell-status-button.tpl');
				return $result;
			}
			elseif ($dataTableRow['task_done']) { 
				return file_get_contents('tpl/table-cell-status-done.tpl');
			}
			else return '';
		}

	}
}
