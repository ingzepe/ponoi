<?php
/**
 * Created by IntelliJ IDEA.
 * User: Armando
 * Date: 11/06/2015
 * Time: 09:24 AM
 */

namespace Application\Model;

use Zend\Config\Reader\Ini;


class Application {

  const SUCCESS                                 = 'success';
  const FAILURE                                 = 'failure';

  const ROL_ADMINISTRADOR                       = 1;
  const ROL_ADMINISTRADOR_PLANTILLAS            = 2;
  const ROL_ADMINISTRADOR_REPORTES              = 3;
  const ROL_PERSONAL_NOMINA                     = 4;
  const ROL_PERSONAL_RH                         = 5;
  const ROL_ADMINISTRADOR_ASISTENCIA            = 6;

  const CONTROL_REPORTE_GENERAR                 = 1;
  const CONTROL_REPORTE_CONSULTAR               = 2;
  const CONTROL_REPORTE_AUTORIZAR_A_DIRECCION   = 3;
  const CONTROL_REPORTE_AUTORIZAR_A_RH          = 4;
  const CONTROL_REPORTE_AUTORIZAR_A_NOMINA      = 5;

  const REPORTE_ESTADO_CALCULANDO               = 1;
  const REPORTE_ESTADO_COMPLETADO               = 2;
  const REPORTE_ESTADO_AUTORIZADO_POR_GERENCIA  = 3;
  const REPORTE_ESTADO_RECHAZADO_POR_GERENCIA   = 4;
  const REPORTE_ESTADO_AUTORIZADO_POR_DIRECCION = 5;
  const REPORTE_ESTADO_RECHAZADO_POR_DIRECCION  = 6;
  const REPORTE_ESTADO_AUTORIZADO_POR_RH        = 7;
  const REPORTE_ESTADO_RECHAZADO_POR_RH         = 8;

  const TIPO_REGLA_SQL                          = 1;
  const TIPO_FREGLA_RECURSIVA                   = 2;
  const TIPO_REPETIR_CAMPO_FECHA                = 1;
  const TIPO_REPETIR_CAMPO_VECES                = 2;
  const CAMPO_ACTIVO                            = 1;
  const TIPO_CAMPO_CATALOGO                     = 1;
  const TIPO_CAMPO_REGLA                        = 2;
  const TIPO_CAMPO_VALOR                        = 3;
  const TIPO_CAMPO_DINAMICO                     = 4;
  const TIPO_EXP_CAMPO                          = 1;
  const TIPO_EXP_REGLA                          = 2;
  const TIPO_EXP_NUMERO                         = 3;
  const TIPO_EXP_OPERADOR                       = 4;
  const TIPO_EXP_PUNTO                          = 5;
  const TIPO_EXP_PARENT_IZQ                     = 6;
  const TIPO_EXP_PARENT_DER                     = 7;
  const TIPO_EXP_EMPLEADO                       = 8;

  const ASISTENCIA_ASISTENCIA                   = 1;
  const ASISTENCIA_RETARDO                      = 2;
  const ASISTENCIA_FALTA                        = 3;
  const ASISTENCIA_DESCANSO                     = 4;
  const ASISTENCIA_INCAPACIDAD                  = 5;
  const ASISTENCIA_VACACIONES                   = 6;
  const ASISTENCIA_FESTIVO                      = 7;
  const ASISTENCIA_FALTA_JUSTIFICADA            = 8;

  //10 mins de tolerancia
  const TOLERANCIA                              = 10;

  //Transform YYYY-mm-dd to dd-mm-YYYY if SQL server is in spanish
  public static function transformDate($date) {
    $reader = new Ini();
    $config = $reader->fromFile('config/autoload/config.ini');
    $sqlsrvlang = $config['sqlsrvlang'];
    if($sqlsrvlang == 'es'){
      $dates = explode('-', $date);
      $date = $dates[2].'-'.$dates[1].'-'.$dates[0];
    }
    return $date;
  }

}