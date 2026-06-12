<?php

namespace App\Enums;

enum Permissions: string
{
    // Usuarios
    case VIEW_USERS = 'view_users';
    case CREATE_USERS = 'create_users';
    case EDIT_USERS = 'edit_users';
    case DELETE_USERS = 'delete_users';

    // Roles
    case VIEW_ROLES = 'view_roles';
    case CREATE_ROLES = 'create_roles';
    case EDIT_ROLES = 'edit_roles';
    case DELETE_ROLES = 'delete_roles';

    // Permisos
    case VIEW_PERMISSIONS = 'view_permissions';
    case CREATE_PERMISSIONS = 'create_permissions';
    case EDIT_PERMISSIONS = 'edit_permissions';
    case DELETE_PERMISSIONS = 'delete_permissions';

    // Categorias
    case VIEW_CATEGORIES = 'view_categories';
    case CREATE_CATEGORIES = 'create_categories';
    case EDIT_CATEGORIES = 'edit_categories';
    case DELETE_CATEGORIES = 'delete_categories';

    // Tallas
    case VIEW_SIZES = 'view_sizes';
    case CREATE_SIZES = 'create_sizes';
    case EDIT_SIZES = 'edit_sizes';
    case DELETE_SIZES = 'delete_sizes';

    // Productos
    case VIEW_PRODUCTS = 'view_products';
    case CREATE_PRODUCTS = 'create_products';
    case EDIT_PRODUCTS = 'edit_products';
    case DELETE_PRODUCTS = 'delete_products';

    // Proveedores 
    case VIEW_SUPPLIERS = 'view_suppliers';
    case CREATE_SUPPLIERS = 'create_suppliers';
    case EDIT_SUPPLIERS = 'edit_suppliers';
    case DELETE_SUPPLIERS = 'delete_suppliers';

    // Clientes
    case VIEW_CUSTOMERS = 'view_customers';
    case CREATE_CUSTOMERS = 'create_customers';
    case EDIT_CUSTOMERS = 'edit_customers';
    case DELETE_CUSTOMERS = 'delete_customers';

    // Compras
    case VIEW_PURCHASES = 'view_purchases';
    case CREATE_PURCHASES = 'create_purchases';
    case EDIT_PURCHASES = 'edit_purchases';
    case DELETE_PURCHASES = 'delete_purchases';

    // Ventas
    case VIEW_SALES = 'view_sales';
    case CREATE_SALES = 'create_sales';
    case EDIT_SALES = 'edit_sales';
    case DELETE_SALES = 'delete_sales';

    // Devoluciones
    case VIEW_DEVOLUTIONS = 'view_devolutions';
    case CREATE_DEVOLUTIONS = 'create_devolutions';
    case EDIT_DEVOLUTIONS = 'edit_devolutions';
    case DELETE_DEVOLUTIONS = 'delete_devolutions';

    // Pagos
    case VIEW_PAYMENTS = 'view_payments';
    case CREATE_PAYMENTS = 'create_payments';
    case EDIT_PAYMENTS = 'edit_payments';
    case DELETE_PAYMENTS = 'delete_payments';

    // Operaciones contables y reportes
    case VIEW_PENDING_COUNTS = 'view_pending_counts';
    case VIEW_TRANSACTIONS = 'view_transactions';
    case VIEW_REPORTS = 'view_reports';

    case VIEW_DASHBOARD = 'view_dashboard';
}