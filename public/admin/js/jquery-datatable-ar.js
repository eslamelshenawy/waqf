
/*
* Author: Magdy Ismail
* Version: 0.1
*
*
* */


let element = `<label>بحث:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="multicolumn_ordering_table"></label>`;

document.querySelector('#multicolumn_ordering_table_filter > label').innerHTML = element;

let pagelement = `<div class="dataTables_paginate paging_simple_numbers" id="multicolumn_ordering_table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="multicolumn_ordering_table_previous"><a href="#" aria-controls="multicolumn_ordering_table" data-dt-idx="0" tabindex="0" class="page-link">السابق</a></li><li class="paginate_button page-item next disabled" id="multicolumn_ordering_table_next"><a href="#" aria-controls="multicolumn_ordering_table" data-dt-idx="1" tabindex="0" class="page-link">التالي</a></li></ul></div>`;

document.querySelector('#multicolumn_ordering_table_paginate').innerHTML = pagelement;

let noDataElement = `<td valign="top" colspan="4" class="dataTables_empty">لا يوجد بيانات</td>`;

let noDataLabel = document.querySelector('.dataTables_empty').innerHTML = noDataElement;

let showingElement = `<div class="dataTables_info" id="multicolumn_ordering_table_info" role="status" aria-live="polite">مشاهدة 0 الي 0 من 0 ادخالات</div>`;

let showingId = document.querySelector('#multicolumn_ordering_table_info').innerHTML = showingElement;

let sortElement = `<div class="dataTables_length" id="multicolumn_ordering_table_length"><label> مشاهدة <select name="multicolumn_ordering_table_length" aria-controls="multicolumn_ordering_table" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> الادخالات </label></div>`;

let newSortElement = document.querySelector('#multicolumn_ordering_table_length').innerHTML = sortElement;