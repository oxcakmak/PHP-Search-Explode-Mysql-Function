<?php
function rawWhereFilterColumn($filter, $search_columns)
{
  $search_terms = explode(' ', $filter);
  $search_condition = "";

  for ($i = 0; $i < count($search_terms); $i++) {
    $term = $search_terms[$i];

    for ($j = 0; $j < count($search_columns); $j++) {
      if ($j == 0) $search_condition .= "(";
      $search_field_name = $search_columns[$j];
      $search_condition .= "$search_field_name LIKE '%" . $term . "%'";
      if ($j + 1 < count($search_columns)) $search_condition .= " OR ";
      if ($j + 1 == count($search_columns)) $search_condition .= ")";
    }
    if ($i + 1 < count($search_terms)) $search_condition .= " AND ";
  }
  return $search_condition;
}
?>
