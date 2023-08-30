import "./bootstrap";
import "../sass/app.scss";

import jQuery from "jquery";
window.$ = jQuery;

import DataTable from "datatables.net-bs5";
DataTable(window, window.$);

//import 'laravel-datatables-vite';
