<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccountingAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $now = Carbon::now();

        $accounts = [
            // ==========================================
            // ACTIVOS (ASSET - REAL)
            // ==========================================
            ['code' => '1.1.01', 'name' => 'Caja', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.02', 'name' => 'Caja Chica', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.03', 'name' => 'Bancos', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.04', 'name' => 'Inversiones Temporales', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.05', 'name' => 'Cuentas por Cobrar Comerciales', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.06', 'name' => 'Efectos por Cobrar Comerciales', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.07', 'name' => 'Efectos por Cobrar en Gestión', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.08', 'name' => 'Efectos por Cobrar Descontados', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.09', 'name' => 'Inventario de Mercancías (Final)', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.10', 'name' => 'Suministros de Oficina', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.11', 'name' => 'Seguros Pagados por Anticipado', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.12', 'name' => 'Alquileres Pagados por Anticipado', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.13', 'name' => 'Intereses Pagados por Anticipado', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.14', 'name' => 'Hipotecas por Cobrar', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.15', 'name' => 'Inversiones Permanentes', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.16', 'name' => 'Terrenos', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.17', 'name' => 'Edificios', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.18', 'name' => 'Instalaciones', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.19', 'name' => 'Maquinarias', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.20', 'name' => 'Equipos de Planta', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.21', 'name' => 'Herramientas', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.22', 'name' => 'Vehículos', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.23', 'name' => 'Equipos de Reparto', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.24', 'name' => 'Equipos de Transporte', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.25', 'name' => 'Mobiliario', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.26', 'name' => 'Equipos de Oficina', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.27', 'name' => 'Equipos de Computación', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.28', 'name' => 'Plusvalía', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.29', 'name' => 'Patentes', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.30', 'name' => 'Marcas de Fábrica', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.31', 'name' => 'Derechos de Autor', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.32', 'name' => 'Franquicias', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.33', 'name' => 'Mejoras a Inmuebles Arrendados', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.34', 'name' => 'Campañas Publicitarias', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.35', 'name' => 'I.V.A. por Compensar', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.36', 'name' => 'I.V.A. Retenido por Terceros', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.37', 'name' => 'I.S.L.R. Retenido por Terceros', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.38', 'name' => 'Crédito Fiscal - I.V.A.', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.39', 'name' => 'Ingresos Acumulados por Cobrar', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.40', 'name' => 'Adelantos a Cuenta de Contratos', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.41', 'name' => 'Depósitos Dados en Garantía', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.42', 'name' => 'Efectos por Cobrar Impagados', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.43', 'name' => 'Efectos por Cobrar - Litigio', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],
            ['code' => '1.1.44', 'name' => 'Fondos Especiales', 'general_type' => 'REAL', 'detail_type' => 'ASSET'],

            // ==========================================
            // PASIVOS (LIABILITY - REAL)
            // ==========================================
            ['code' => '2.1.01', 'name' => 'I.V.A. por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.02', 'name' => 'I.V.A. Retenido a Proveedores', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.03', 'name' => 'I.S.L.R. por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.04', 'name' => 'I.S.L.R. Retenido a Proveedores', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.05', 'name' => 'Débito Fiscal - I.V.A.', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.06', 'name' => 'Efectos por Pagar Proveedores', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.07', 'name' => 'Cuentas por Pagar Proveedores', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.08', 'name' => 'Préstamos Bancarios por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.09', 'name' => 'Deuda por Efectos Descontados', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.10', 'name' => 'Obligaciones ó Bonos por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.11', 'name' => 'Hipotecas por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.12', 'name' => 'Provisión para Remuneraciones', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.13', 'name' => 'Provisión Prestaciones Sociales', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.14', 'name' => 'Alquileres Cobrados x Anticipado', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.15', 'name' => 'Intereses Cobrados x Anticipado', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.16', 'name' => 'Gastos Acumulados por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.17', 'name' => 'Retención por Pagar (SSO, etc)', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.18', 'name' => 'Aportación Patronal por Pagar', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],
            ['code' => '2.1.19', 'name' => 'Depósitos Recibidos en Garantía', 'general_type' => 'REAL', 'detail_type' => 'LIABILITY'],

            // ==========================================
            // PATRIMONIO (EQUITY - REAL)
            // ==========================================
            ['code' => '3.1.01', 'name' => 'Capital', 'general_type' => 'REAL', 'detail_type' => 'EQUITY'],
            ['code' => '3.1.02', 'name' => 'Reserva Legal', 'general_type' => 'REAL', 'detail_type' => 'EQUITY'],
            ['code' => '3.1.03', 'name' => 'Reserva Estatutaria', 'general_type' => 'REAL', 'detail_type' => 'EQUITY'],
            ['code' => '3.1.04', 'name' => 'Reserva Voluntaria', 'general_type' => 'REAL', 'detail_type' => 'EQUITY'],
            ['code' => '3.1.05', 'name' => 'Utilidad o Pérdida Acumulada', 'general_type' => 'REAL', 'detail_type' => 'EQUITY'],

            // ==========================================
            // INGRESOS (REVENUE - NOMINAL)
            // ==========================================
            ['code' => '4.1.01', 'name' => 'Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.02', 'name' => 'Intereses Ganados', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.03', 'name' => 'Alquileres Ganados', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.04', 'name' => 'Servicios Prestados', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.05', 'name' => 'Ganancias en Ventas de Activos', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.06', 'name' => 'Descuento Pronto Pago Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.07', 'name' => 'Descuento en Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.08', 'name' => 'Devoluciones en Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.09', 'name' => 'Rebajas en Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],
            ['code' => '4.1.10', 'name' => 'Bonificaciones en Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'REVENUE'],

            // ==========================================
            // EGRESOS (EXPENSE - NOMINAL)
            // ==========================================
            ['code' => '5.1.01', 'name' => 'Inventario Mercancías (Inicial)', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.02', 'name' => 'Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.03', 'name' => 'Fletes en Compras', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.04', 'name' => 'Gastos de Importación', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.05', 'name' => 'Sueldos Depto Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.06', 'name' => 'Sueldos Depto Administración', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.07', 'name' => 'Bonificación Alimenticia', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.08', 'name' => 'Vacaciones y Bono Vacacional', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.09', 'name' => 'Utilidades del Personal', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.10', 'name' => 'Comisiones de Vendedores', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.11', 'name' => 'Fletes en Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.12', 'name' => 'Gastos Publicidad y Propaganda', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.13', 'name' => 'Gastos de Viaje y Viáticos', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.14', 'name' => 'Honorarios Profesionales', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.15', 'name' => 'Material de Oficina', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.16', 'name' => 'Material de Limpieza', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.17', 'name' => 'Mantenimiento y Reparación', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.18', 'name' => 'Servicios Básicos', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.19', 'name' => 'Depreciación Activos Fijos', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.20', 'name' => 'Amortización Intangibles', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.21', 'name' => 'Descuento Pronto Pago Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.22', 'name' => 'Pérdidas x Deterioro Créditos', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.23', 'name' => 'Pérdidas x Deterioro Inventario', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.24', 'name' => 'Pérdidas x Créditos Incobrables', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.25', 'name' => 'Pérdidas Ventas Activos Fijos', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.26', 'name' => 'Gastos por Intereses', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.27', 'name' => 'Gastos por Alquileres', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.28', 'name' => 'Descuento en Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.29', 'name' => 'Devoluciones en Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.30', 'name' => 'Rebajas en Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],
            ['code' => '5.1.31', 'name' => 'Bonificaciones en Ventas', 'general_type' => 'NOMINAL', 'detail_type' => 'EXPENSE'],

            // ==========================================
            // VALUACION (VALUATION - VALUATION)
            // ==========================================
            ['code' => '6.1.01', 'name' => 'Depreciación Acumulada', 'general_type' => 'VALUATION', 'detail_type' => 'VALUATION'],
            ['code' => '6.1.02', 'name' => 'Amortización Acumulada', 'general_type' => 'VALUATION', 'detail_type' => 'VALUATION'],
            ['code' => '6.1.03', 'name' => 'Deterioro Créditos Comerciales', 'general_type' => 'VALUATION', 'detail_type' => 'VALUATION'],
            ['code' => '6.1.04', 'name' => 'Deterioro de Valor Inventarios', 'general_type' => 'VALUATION', 'detail_type' => 'VALUATION'],
        ];

        $mappedAccounts = array_map(function ($account) use ($now) {
            $account['created_at'] = $now;
            $account['updated_at'] = $now;
            return $account;
        }, $accounts);

        $chunks = array_chunk($mappedAccounts, 50);

        foreach ($chunks as $chunk) {
            DB::table('accounting_accounts')->insert($chunk);
        }
    }
}