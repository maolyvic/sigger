<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('causa_muerte', function (Blueprint $table) {
            $table->id();
            $table->string('numero_entrada');
            $table->enum('despacho', ['SENAMECF', 'CICPC', 'CPNB', 'GNB', 'OTROS']);
            $table->string('numero_expediente')->nullable();
            $table->enum('direccion_remocion_cadaver', ['AMBULATORIO', 'CDI', 'CENTRO PENITENCIARIO', 'CICPC', 'CLINICA', 'HOSPITAL', 'NO DECLARADO', 'OTROS', 'CPNB', 'GNB', 'VIA PUBLICA'])->nullable();
            $table->enum('delito', ['HOMICIDIO', 'SUICIDIO', 'INTERVENCIÓN LEGAL', 'A DETERMINAR', 'RESPONSABILIDAD PROFESIONAL', 'TRÁNSITO', 'NATURAL', 'ACCIDENTAL']);
            $table->enum('causa_muerte', ['HXAF', 'HXAB', 'A DETERMINAR', 'AHORCADO', 'POLITRAUMATISMO', 'NATURAL', 'AHOGADO', 'QUEMADO', 'ELECTROCUTADO', 'HIPOTERMÍA', 'ASFIXIA MÉCANICA', 'ESTRANGULAMIENTO', 'ENVENENAMIENTO']);
            $table->enum('mecanismo_causa_muerte', ['CAÍDA DE ALTURA', 'CAÍDA DE SUS PROPIOS PIES', 'OBJETO CONTUNDENTE', 'ARROLLAMIENTO DE METRO', 'LINCHAMIENTO', 'INHALACIÓN DE GASES', 'TRAUMA TÉRMICO', 'APLASTAMIENTO', 'TERREMOTO', 'ACCIDENTE AÉREO', 'INUNDACIÓN', 'RAYOS', 'INCENDIO', 'INTOXICACIÓN EXÓGENA', 'EXPLOSIÓN', 'ACCIDENTE DE TRÁNSITO', 'ABALANZAMIENTO', 'TAPIADO', 'SE DESCONOCE', 'ASFIXIA MÉCANICA', 'OTROS']);
            $table->enum('tipo_vehiculo', ['AUTOMÓVIL', 'MOTO', 'CAMIONETA', 'CAMIÓN', 'NO', 'AEREO', 'POR DETERMINAR'])->nullable();
            $table->date('fecha_suceso_transito')->nullable();
            $table->date('fecha_ingreso_cadaver');
            $table->time('hora'); // Cambiado a 'time' para mayor precisión

            $table->foreignId('estado_id')->constrained('estados');

            $table->foreignId('municipio_id')->constrained('municipios');

            $table->foreignId('parroquia_id')->constrained('parroquias');

            $table->foreignId('sector_id')->nullable()->constrained('sectores');

            $table->string('direccion_exacta');
            $table->enum('categorizacion_referencias', ['BARRIO O CASERÍO', 'CENTRO DE SALUD', 'CENTRO PENITENCIARIO', 'GRAN MISIÓN VIVIENDA VENEZUELA (GMVV)', 'HOTEL O POSADA', 'INSTALACIONES DEL ESTADO VENEZOLANO', 'INTERIOR DE VEHÍCULO', 'URBANIZACIÓN O CONJUNTO RESIDENCIAL', 'VÍA PÚBLICA', 'OTROS']);
            $table->string('nombres_apellidos')->nullable();
            $table->enum('sexo', ['MASCULINO', 'FEMENINO', 'POR DETERMINAR', 'SE DESCONOCE']);
            $table->enum('embarazada', ['SI', 'NO'])->nullable();
            $table->integer('edad');
            $table->enum('edad_medida', ['DÍA (S)', 'MES (ES)', 'AÑO (S)', 'MES (ES) DE GESTACIÓN', 'SE DESCONOCE']);
            $table->enum('grupo_etario', ['N/A', '0 A 4', '5 A 9', '10 A 14', '15 A 19', '20 A 24', '25 A 29', '30 A 34', '35 A 39', '40 A 44', '45 A 49', '50 A 54', '55 A 59', '60 A 64', '65 A 69', '70 A 74', '75 A 79', '80 A MÁS', 'POR DETERMINAR']);
            $table->enum('tipo_identificacion', ['CÉDULA', 'PASAPORTE', 'PARTIDA DE NACIMIENTO', 'NO IDENTIFICADO'])->nullable();
            $table->enum('nacionalidad', ['VENEZOLANA', 'EXTRANJERA', 'POR DETERMINAR', 'SE DESCONOCE'])->nullable();
            $table->string('identificacion')->nullable();
            $table->enum('nivel_instruccion', ['SIN ESTUDIOS', 'BÁSICA', 'BACHILLER', 'UNIVERSITARIO', 'SIN INFORMACIÓN'])->nullable();
            $table->enum('sitio_donde_laboraba', ['CUERPO DE SEGURIDAD CIUDADANA', 'SERVIDOR PÚBLICO', 'EMPRESA PRIVADA', 'DETENIDO'])->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha_dictamen_muerte');
            $table->time('hora_dictamen_muerte'); // Cambiado a 'time'
            $table->enum('fases_descomposicion', ['FRESCO', 'PUTREFACTO', 'OSAMENTO']);
            $table->text('observaciones')->nullable();

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causa_muerte');
    }
};
