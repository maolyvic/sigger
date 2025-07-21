<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParroquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parroquias = [
            //---Amazonas---


            //MUN_ALTO_ORINOCO
            ['nombre' => 'ALTO ORINOCO', 'municipio_id' => 1],
            ['nombre' => 'HUACHAMACARE', 'municipio_id' => 1],
            ['nombre' => 'MARAWAKA', 'municipio_id' => 1],
            ['nombre' => 'MAVAKA', 'municipio_id' => 1],
            ['nombre' => 'SIERRA PARIMA', 'municipio_id' => 1],
            //MUN_ATABAPO
            ['nombre' => 'ATABAPO', 'municipio_id' => 2],
            ['nombre' => 'UCATA', 'municipio_id' => 2],
            ['nombre' => 'YAPACANA', 'municipio_id' => 2],
            ['nombre' => 'CANAME', 'municipio_id' => 2],
            //MUN_ATURES
            ['nombre' => 'FERNANDO GIRÓN TOVAR', 'municipio_id' => 3],
            ['nombre' => 'LUIS ALBERTO GÓMEZ', 'municipio_id' => 3],
            ['nombre' => 'PAHUEÑA', 'municipio_id' => 3],
            ['nombre' => 'PLATANILLAL', 'municipio_id' => 3],
            //MUN_MANAPIARE
            ['nombre' => 'ALTO VENTUARI', 'municipio_id' => 4],
            ['nombre' => 'MEDIO VENTUARI', 'municipio_id' => 4],
            ['nombre' => 'BAJO VENTUARI', 'municipio_id' => 4],
            ['nombre' => 'MANAPIARE', 'municipio_id' => 4],
            //MAROA
            ['nombre' => 'MAROA', 'municipio_id' => 5],
            ['nombre' => 'VICTORINO', 'municipio_id' => 5],
            ['nombre' => 'COMUNIDAD', 'municipio_id' => 5],
            //RIO_NEGRO
            ['nombre' => 'CASIQUIARE', 'municipio_id' => 6],
            ['nombre' => 'COCUY', 'municipio_id' => 6],
            ['nombre' => 'SAN CARLOS DE RÍO NEGRO', 'municipio_id' => 6],
            ['nombre' => 'SOLANO', 'municipio_id' => 6],
            
            
            //---Anzoategui---


            //MUN_ANACO
            ['nombre' => 'ANACO', 'municipio_id' => 7],
            ['nombre' => 'SAN JOAQUÍN', 'municipio_id' => 7],
            //MUN_ARAGUA
            ['nombre' => 'CACHIPO', 'municipio_id' => 8],
            ['nombre' => 'ARAGUA DE BARCELONA', 'municipio_id' => 8],
            //MUN_DIEGO_BAUTISTA_URBANEJA
            ['nombre' => 'LECHERÍA', 'municipio_id' => 9],
            ['nombre' => 'EL MORRO', 'municipio_id' => 9],
            //MUN_FERNANDOPEÑALVER
            ['nombre' => 'PUERTOPÍRITU', 'municipio_id' => 10],
            ['nombre' => 'SAN MIGUEL', 'municipio_id' => 10],
            ['nombre' => 'SUCRE', 'municipio_id' => 10],
            //MUN_FRANCISCO_DEL_CARMEN_CARVAJAL
            ['nombre' => 'VALLE DE GUANAPE', 'municipio_id' => 11],
            ['nombre' => 'SANTA BÁRBARA', 'municipio_id' => 11],
            //MUN_FRANCISCO_DE_MIRANDA_AN
            ['nombre' => 'ATAPIRIRE', 'municipio_id' => 12],
            ['nombre' => 'BOCA DEL PAO', 'municipio_id' => 12],
            ['nombre' => 'EL PAO', 'municipio_id' => 12],
            ['nombre' => 'PARIAGUÁN', 'municipio_id' => 12],
            //MUN_GUANTA
            ['nombre' => 'GUANTA', 'municipio_id' => 13],
            ['nombre' => 'CHORRERÓN', 'municipio_id' => 13],
            //MUN_INDEPENDENCIA_AN
            ['nombre' => 'MAMO', 'municipio_id' => 14],
            ['nombre' => 'SOLEDAD', 'municipio_id' => 14],
            //MUN_JOSÉ_GREGORIO_MONAGAS
            ['nombre' => 'MAPIRE', 'municipio_id' => 15],
            ['nombre' => 'PIAR', 'municipio_id' => 15],
            ['nombre' => 'SANTA CLARA', 'municipio_id' => 15],
            ['nombre' => 'SAN DIEGO DE CABRUTICA', 'municipio_id' => 15],
            ['nombre' => 'UVERITO', 'municipio_id' => 15],
            ['nombre' => 'ZUATA', 'municipio_id' => 15],
            //MUN_JUAN_ANTONIO_SOTILLO
            ['nombre' => 'PUERTO LA CRUZ', 'municipio_id' => 16],
            ['nombre' => 'POZUELOS', 'municipio_id' => 16],
            //MUN_JUAN_MANUEL_CAJIGAL
            ['nombre' => 'ONOTO', 'municipio_id' => 17],
            ['nombre' => 'SAN PABLO', 'municipio_id' => 17],
            //MUN_LIBERTAD_AN
            ['nombre' => 'SAN MATEO', 'municipio_id' => 18],
            ['nombre' => 'EL CARITO', 'municipio_id' => 18],
            ['nombre' => 'SANTA INÉS', 'municipio_id' => 18],
            ['nombre' => 'LA ROMEREÑA', 'municipio_id' => 18],
            //MUN_MANUEL_EZEQUIEL_BRUZUAL
            ['nombre' => 'CLARINES', 'municipio_id' => 19],
            ['nombre' => 'GUANAPE', 'municipio_id' => 19],
            ['nombre' => 'SABANA DE UCHIRE', 'municipio_id' => 19],
            //MUN_PEDRO_MARÍA_FREITES
            ['nombre' => 'CANTAURA', 'municipio_id' => 20],
            ['nombre' => 'LIBERTADOR', 'municipio_id' => 20],
            ['nombre' => 'SANTA ROSA', 'municipio_id' => 20],
            ['nombre' => 'URICA', 'municipio_id' => 20],
            //MUN_PÍRITU_AN
            ['nombre' => 'PÍRITU', 'municipio_id' => 21],
            ['nombre' => 'SAN FRANCISCO', 'municipio_id' => 21],
            //MUN_SAN_JOSÉ_DE_GUANIPA
            ['nombre' => 'SAN JOSÉ DE GUANIPA', 'municipio_id' => 22],
            //MUN_SAN_JUAN_DE_CAPISTRANO
            ['nombre' => 'BOCA DE UCHIRE', 'municipio_id' => 23],
            ['nombre' => 'BOCA DE CHÁVEZ', 'municipio_id' => 23],
            //MUN_SANTA_ANA
            ['nombre' => 'PUEBLO NUEVO', 'municipio_id' => 24],
            ['nombre' => 'SANTA ANA', 'municipio_id' => 24],
            //MUN_SIMÓN_BOLÍVAR_AN
            ['nombre' => 'BERGATÍN', 'municipio_id' => 25],
            ['nombre' => 'CAIGUA', 'municipio_id' => 25],
            ['nombre' => 'EL CARMEN', 'municipio_id' => 25],
            ['nombre' => 'EL PILAR', 'municipio_id' => 25],
            ['nombre' => 'NARICUAL', 'municipio_id' => 25],
            ['nombre' => 'SAN CRISTÓBAL', 'municipio_id' => 25],
            //MUN_SIMÓN_RODRÍGUEZ_AN
            ['nombre' => 'EDMUNDO BARRIOS', 'municipio_id' => 26],
            ['nombre' => 'MIGUEL OTERO SILVA', 'municipio_id' => 26],
            //MUN_GENERAL_SIR_ARTHUR_MCGREGOR
            ['nombre' => 'EL CHAPARRO', 'municipio_id' => 27],
            ['nombre' => 'TOMÁS ALFARO CALATRAVA', 'municipio_id' => 27],
            
            //---Apure---

            //MUN_ACHAGUAS
            ['nombre' => 'ACHAGUAS', 'municipio_id' => 28],
            ['nombre' => 'APURITO', 'municipio_id' => 28],
            ['nombre' => 'EL YAGUAL', 'municipio_id' => 28],
            ['nombre' => 'GUACHARA', 'municipio_id' => 28],
            ['nombre' => 'MUCURITAS', 'municipio_id' => 28],
            ['nombre' => 'QUESERAS DEL MEDIO', 'municipio_id' => 28],
            //MUN_BIRUACA
            ['nombre' => 'BIRUACA', 'municipio_id' => 29],
            //MUN_MUÑOZ
            ['nombre' => 'BRUZUAL', 'municipio_id' => 30],
            ['nombre' => 'MANTECAL', 'municipio_id' => 30],
            ['nombre' => 'QUINTERO', 'municipio_id' => 30],
            ['nombre' => 'RINCÓN HONDO', 'municipio_id' => 30],
            ['nombre' => 'SAN VICENTE', 'municipio_id' => 30],
            //MUN_PEDRO_CAMEJO
            ['nombre' => 'SAN JUAN DE PAYARA', 'municipio_id' => 31],
            ['nombre' => 'CODAZZI', 'municipio_id' => 31],
            ['nombre' => 'CUNAVICHE', 'municipio_id' => 31],
            //MUN_SAN_FERNANDO
            ['nombre' => 'SAN FERNANDO', 'municipio_id' => 32],
            ['nombre' => 'EL RECREO', 'municipio_id' => 32],
            ['nombre' => 'PEÑALVER', 'municipio_id' => 32],
            ['nombre' => 'SAN RAFAEL DE ATAMAICA', 'municipio_id' => 32],
            ['nombre' => 'DISTRITO ALTO APURE', 'municipio_id' => 32],
            //MUN_PÁEZ
            ['nombre' => 'GUASDUALITO', 'municipio_id' => 33],
            ['nombre' => 'ARAMENDI', 'municipio_id' => 33],
            ['nombre' => 'EL AMPARO', 'municipio_id' => 33],
            ['nombre' => 'SAN CAMILO', 'municipio_id' => 33],
            ['nombre' => 'URDANETA', 'municipio_id' => 33],
            //MUN_RÓMULO_GALLEGOS
            ['nombre' => 'ELORZA', 'municipio_id' => 34],
            ['nombre' => 'LA TRINIDAD', 'municipio_id' => 34],
            
            
            //---Aragua---


            //MUN_BOLÍVAR_AR
            ['nombre' => 'BOLÍVAR', 'municipio_id' => 35],
            ['nombre' => 'CARMEN DE CURA', 'municipio_id' => 35],
            //MUN_CAMATAGUA
            ['nombre' => 'CAMATAGUA', 'municipio_id' => 36],
            //MUN_FRANCISCO LINARES ALCÁNTARA
            ['nombre' => 'SANTA RITA', 'municipio_id' => 37],
            ['nombre' => 'FRANCISCO DE MIRANDA', 'municipio_id' => 37],
            ['nombre' => 'MOSEÑOR FELICIANO GONZÁLEZ', 'municipio_id' => 37],
            //MUN_ATANASIO GIRARDOT
            ['nombre' => 'PEDRO JOSÉ OVALLES', 'municipio_id' => 38],
            ['nombre' => 'JOAQUÍN CRESPO', 'municipio_id' => 38],
            ['nombre' => 'JOSÉ CASANOVA GODOY', 'municipio_id' => 38],
            ['nombre' => 'MADRE MARÍA DE SAN JOSÉ', 'municipio_id' => 38],
            ['nombre' => 'ANDRÉS ELOY BLANCO', 'municipio_id' => 38],
            ['nombre' => 'LOS TACARIGUAS', 'municipio_id' => 38],
            ['nombre' => 'LAS DELICIAS', 'municipio_id' => 38],
            ['nombre' => 'CHORONÍ', 'municipio_id' => 38],
            //MUN_JOSÉ ÁNGEL LAMAS
            ['nombre' => 'SANTA CRUZ', 'municipio_id' => 39],
            //MUN_JOSÉ FÉLIX RIBAS
            ['nombre' => 'JOSÉ FÉLIX RIBAS', 'municipio_id' => 40],
            ['nombre' => 'CASTOR NIEVES RÍOS', 'municipio_id' => 40],
            ['nombre' => 'LAS GUACAMAYAS', 'municipio_id' => 40],
            ['nombre' => 'PAO DE ZÁRATE', 'municipio_id' => 40],
            ['nombre' => 'ZUATA', 'municipio_id' => 40],
            //MUN_JOSÉ RAFAEL REVENGA
            ['nombre' => 'JOSÉ RAFAEL REVENGA', 'municipio_id' => 41],
            //MUN_LIBERTADOR_AR
            ['nombre' => 'PALO NEGRO', 'municipio_id' => 42],
            ['nombre' => 'SAN MARTÍN DEPORRES', 'municipio_id' => 42],
            //MUN_MARIO BRICEÑO IRAGORRY
            ['nombre' => 'EL LIMÓN', 'municipio_id' => 43],
            ['nombre' => 'CAÑA DE AZÚCAR', 'municipio_id' => 43],
            //MUN_OCUMARE DE LA COSTA DE ORO
            ['nombre' => 'OCUMARE DE LA COSTA', 'municipio_id' => 44],
            //MUN_SAN CASIMIRO
            ['nombre' => 'SAN CASIMIRO', 'municipio_id' => 45],
            ['nombre' => 'GÜIRIPA', 'municipio_id' => 45],
            ['nombre' => 'OLLAS DE CARAMACATE', 'municipio_id' => 45],
            ['nombre' => 'VALLE MORÍN', 'municipio_id' => 45],
            //MUN_SAN SEBASTIÁN
            ['nombre' => 'SAN SEBASTIÁN', 'municipio_id' => 46],
            //MUN_SANTIAGO MARIÑO
            ['nombre' => 'TURMERO', 'municipio_id' => 47],
            ['nombre' => 'AREVALO APONTE', 'municipio_id' => 47],
            ['nombre' => 'CHUAO', 'municipio_id' => 47],
            ['nombre' => 'SAMÁN DE GÜERE', 'municipio_id' => 47],
            ['nombre' => 'ALFREDO PACHECO MIRANDA', 'municipio_id' => 47],
            //MUN_SANTOS MICHELENA
            ['nombre' => 'SANTOS MICHELENA', 'municipio_id' => 48],
            ['nombre' => 'TIARA', 'municipio_id' => 48],
            //MUN_SUCRE_AR
            ['nombre' => 'CAGUA', 'municipio_id' => 49],
            ['nombre' => 'BELLA VISTA', 'municipio_id' => 49],
            //MUN_TOVAR_AR
            ['nombre' => 'TOVAR', 'municipio_id' => 50],
            //MUN_URDANETA_AR
            ['nombre' => 'URDANETA', 'municipio_id' => 51],
            ['nombre' => 'LAS PEÑITAS', 'municipio_id' => 51],
            ['nombre' => 'SAN FRANCISCO DE CARA', 'municipio_id' => 51],
            ['nombre' => 'TAGUAY', 'municipio_id' => 51],
            ['nombre' => 'VALLES DE TUCUTUNEMO', 'municipio_id' => 51],
            //MUN_ZAMORA_AR
            ['nombre' => 'VILLA DE CURA', 'municipio_id' => 52],
            ['nombre' => 'MAGDALENO', 'municipio_id' => 52],
            ['nombre' => 'SAN FRANCISCO DE ASÍS', 'municipio_id' => 52],
            ['nombre' => 'AUGUSTO MIJARES', 'municipio_id' => 52],

            //---Barinas---

            //MUN_ALBERTO_ARVELO_TORREALBA
            ['nombre' => 'SABANETA', 'municipio_id' => 53],
            ['nombre' => 'JUAN ANTONIO RODRÍGUEZ DOMÍNGUEZ', 'municipio_id' => 53],
            //MUN_ANDRÉSELOY_BLANCO_BA
            ['nombre' => 'EL CANTÓN', 'municipio_id' => 54],
            ['nombre' => 'SANTA CRUZ DE GUACAS', 'municipio_id' => 54],
            ['nombre' => 'PUERTO VIVAS', 'municipio_id' => 54],
            //MUN_ANTONIO_JOSÉ_DE_SUCRE
            ['nombre' => 'TICOPORO', 'municipio_id' => 55],
            ['nombre' => 'NICOLÁSPULIDO', 'municipio_id' => 55],
            ['nombre' => 'ANDRÉS BELLO', 'municipio_id' => 55],
            //MUN_ARISMENDI_BA
            ['nombre' => 'ARISMENDI', 'municipio_id' => 56],
            ['nombre' => 'GUADARRAMA', 'municipio_id' => 56],
            ['nombre' => 'LA UNIÓN', 'municipio_id' => 56],
            ['nombre' => 'SAN ANTONIO', 'municipio_id' => 56],
            //MUN_BARINAS
            ['nombre' => 'BARINAS', 'municipio_id' => 57],
            ['nombre' => 'ALBERTO ARVELO LARRIVA', 'municipio_id' => 57],
            ['nombre' => 'SAN SILVESTRE', 'municipio_id' => 57],
            ['nombre' => 'SANTA INÉS', 'municipio_id' => 57],
            ['nombre' => 'SANTA LUCÍA', 'municipio_id' => 57],
            ['nombre' => 'TORUNOS', 'municipio_id' => 57],
            ['nombre' => 'EL CARMEN', 'municipio_id' => 57],
            ['nombre' => 'RÓMULO BETANCOURT', 'municipio_id' => 57],
            ['nombre' => 'CORAZÓN DE JESÚS', 'municipio_id' => 57],
            ['nombre' => 'RAMÓN IGNACIO MÉNDEZ', 'municipio_id' => 57],
            ['nombre' => 'ALTO BARINAS', 'municipio_id' => 57],
            ['nombre' => 'MANUEL PALACIO FAJARDO', 'municipio_id' => 57],
            ['nombre' => 'JUAN ANTONIO RODRÍGUEZ DOMÍNGUEZ', 'municipio_id' => 57],
            ['nombre' => 'DOMINGA ORTIZ DE PÁEZ', 'municipio_id' => 57],
            //MUN_BOLÍVAR_BA
            ['nombre' => 'BARINITAS', 'municipio_id' => 58],
            ['nombre' => 'ALTAMIRA DE CÁCERES', 'municipio_id' => 58],
            ['nombre' => 'CALDERAS', 'municipio_id' => 58],
            //MUN_CRUZ_PAREDES
            ['nombre' => 'BARRANCAS', 'municipio_id' => 59],
            ['nombre' => 'EL SOCORRO', 'municipio_id' => 59],
            ['nombre' => 'MAZPARRITO', 'municipio_id' => 59],
            //MUN_EZEQUIEL_ZAMORA_BA
            ['nombre' => 'SANTA BÁRBARA', 'municipio_id' => 60],
            ['nombre' => 'PEDRO BRICEÑO MÉNDEZ', 'municipio_id' => 60],
            ['nombre' => 'RAMÓN IGNACIO MÉNDEZ', 'municipio_id' => 60],
            ['nombre' => 'JOSÉ IGNACIO DELPUMAR', 'municipio_id' => 60],
            //MUN_OBISPOS
            ['nombre' => 'OBISPOS', 'municipio_id' => 61],
            ['nombre' => 'LOS GUASIMITOS', 'municipio_id' => 61],
            ['nombre' => 'EL REAL', 'municipio_id' => 61],
            ['nombre' => 'LA LUZ', 'municipio_id' => 61],
            //MUN_PEDRAZA
            ['nombre' => 'CIUDAD BOLÍVIA', 'municipio_id' => 62],
            ['nombre' => 'JOSÉ IGNACIO BRICEÑO', 'municipio_id' => 62],
            ['nombre' => 'JOSÉ FÉLIX RIBAS', 'municipio_id' => 62],
            ['nombre' => 'PÁEZ', 'municipio_id' => 62],
            //MUN_ROJAS
            ['nombre' => 'LIBERTAD', 'municipio_id' => 63],
            ['nombre' => 'DOLORES', 'municipio_id' => 63],
            ['nombre' => 'SANTA ROSA', 'municipio_id' => 63],
            ['nombre' => 'PALACIO FAJARDO', 'municipio_id' => 63],
            ['nombre' => 'SIMÓN RODRÍGUEZ', 'municipio_id' => 63],
            //MUN_SOSA
            ['nombre' => 'CIUDAD DE NUTRIAS', 'municipio_id' => 64],
            ['nombre' => 'EL REGALO', 'municipio_id' => 64],
            ['nombre' => 'PUERTO NUTRIAS', 'municipio_id' => 64],
            ['nombre' => 'SANTA CATALINA', 'municipio_id' => 64],
            ['nombre' => 'SIMÓN BOLÍVAR', 'municipio_id' => 64],
            
            //---Bolívar---

            //MUN_CARONÍ (65)
            ['nombre' => 'CACHAMAY', 'municipio_id' => 65],
            ['nombre' => 'CHIRICA', 'municipio_id' => 65],
            ['nombre' => 'DALLA COSTA', 'municipio_id' => 65],
            ['nombre' => 'ONCE DE ABRIL', 'municipio_id' => 65],
            ['nombre' => 'SIMÓN BOLÍVAR', 'municipio_id' => 65],
            ['nombre' => 'UNARE', 'municipio_id' => 65],
            ['nombre' => 'UNIVERSIDAD', 'municipio_id' => 65],
            ['nombre' => 'VISTA AL SOL', 'municipio_id' => 65],
            ['nombre' => 'POZO VERDE', 'municipio_id' => 65],
            ['nombre' => 'YOCOIMA', 'municipio_id' => 65],
            ['nombre' => '5 DE JULIO', 'municipio_id' => 65],
            //MUN_CEDEÑO_BO (66)
            ['nombre' => 'CEDEÑO', 'municipio_id' => 66],
            ['nombre' => 'ALTAGRACIA', 'municipio_id' => 66],
            ['nombre' => 'ASCENSIÓN FARRERAS', 'municipio_id' => 66],
            ['nombre' => 'GUANIAMO', 'municipio_id' => 66],
            ['nombre' => 'LA URBANA', 'municipio_id' => 66],
            ['nombre' => 'PIJIGUAOS', 'municipio_id' => 66],
            //MUN_EL_CALLAO (67)
            ['nombre' => 'EL CALLAO', 'municipio_id' => 67],
            //MUN_GRAN_SABANA (68)
            ['nombre' => 'GRAN SABANA', 'municipio_id' => 68],
            ['nombre' => 'IKABARÚ', 'municipio_id' => 68],
            //MUN_HERES (69)
            ['nombre' => 'CATEDRAL', 'municipio_id' => 69],
            ['nombre' => 'ZEA', 'municipio_id' => 69],
            ['nombre' => 'ORINOCO', 'municipio_id' => 69],
            ['nombre' => 'JOSÉ ANTONIO PÁEZ', 'municipio_id' => 69],
            ['nombre' => 'MARHUANTA', 'municipio_id' => 69],
            ['nombre' => 'AGUA SALADA', 'municipio_id' => 69],
            ['nombre' => 'VISTA HERMOSA', 'municipio_id' => 69],
            ['nombre' => 'LA SABANITA', 'municipio_id' => 69],
            ['nombre' => 'PANAPANA', 'municipio_id' => 69],
            //MUN_PADREPEDRO_CHIEN (70)
            ['nombre' => 'PADRE PEDRO CHIEN', 'municipio_id' => 70],
            ['nombre' => 'RÍO GRANDE', 'municipio_id' => 70],
            //MUN_PIAR (71)
            ['nombre' => 'ANDRÉS ELOY BLANCO', 'municipio_id' => 71],
            ['nombre' => 'PEDRO COVA', 'municipio_id' => 71],
            ['nombre' => 'UPATA', 'municipio_id' => 71],
            //MUN_ANGOSTURA_RAÚL_LEONI (72)
            ['nombre' => 'RAÚL LEONI', 'municipio_id' => 72],
            ['nombre' => 'BARCELONETA', 'municipio_id' => 72],
            ['nombre' => 'SANTA BÁRBARA', 'municipio_id' => 72],
            ['nombre' => 'SAN FRANCISCO', 'municipio_id' => 72],
            //MUN_ROSCIO (73)
            ['nombre' => 'ROSCIO', 'municipio_id' => 73],
            ['nombre' => 'SALÓM', 'municipio_id' => 73],
            //MUN_SIFONTES (74)
            ['nombre' => 'TUMEREMO', 'municipio_id' => 74],
            ['nombre' => 'DALLA COSTA', 'municipio_id' => 74],
            ['nombre' => 'SAN ISIDRO', 'municipio_id' => 74],
            //MUN_SUCRE_BO (75)
            ['nombre' => 'SUCRE', 'municipio_id' => 75],
            ['nombre' => 'ARIPAO', 'municipio_id' => 75],
            ['nombre' => 'GUARATARO', 'municipio_id' => 75],
            ['nombre' => 'LAS MAJADAS', 'municipio_id' => 75],
            ['nombre' => 'MOITACO', 'municipio_id' => 75],

            //---Carabobo---
            
            //MUN_BEJUMA (76)
            ['nombre' => 'BEJUMA', 'municipio_id' => 76],
            ['nombre' => 'CANOABO', 'municipio_id' => 76],
            ['nombre' => 'SIMÓN BOLÍVAR', 'municipio_id' => 76],
            //MUN_CARLOS_ARVELO (77)
            ['nombre' => 'GÜIGÜE', 'municipio_id' => 77],
            ['nombre' => 'BELÉN', 'municipio_id' => 77],
            ['nombre' => 'TACARIGUA', 'municipio_id' => 77],
            //MUN_DIEGO_IBARRA (78)
            ['nombre' => 'MARIARA', 'municipio_id' => 78],
            ['nombre' => 'AGUAS CALIENTES', 'municipio_id' => 78],
            //MUN_GUACARA (79)
            ['nombre' => 'CIUDAD ALIANZA', 'municipio_id' => 79],
            ['nombre' => 'GUACARA', 'municipio_id' => 79],
            ['nombre' => 'YAGUA', 'municipio_id' => 79],
            //MUN_JUAN_JOSÉ_MORA (80)
            ['nombre' => 'MORÓN', 'municipio_id' => 80],
            ['nombre' => 'URAMA', 'municipio_id' => 80],
            //MUN_LIBERTADOR_CA (81)
            ['nombre' => 'TOCUYITO', 'municipio_id' => 81],
            ['nombre' => 'INDEPENDENCIA', 'municipio_id' => 81],
            //MUN_LOS_GUAYOS (82)
            ['nombre' => 'LOS GUAYOS', 'municipio_id' => 82],
            //MUN_MIRANDA_CA (83)
            ['nombre' => 'MIRANDA', 'municipio_id' => 83],
            //MUN_MONTALBÁN (84)
            ['nombre' => 'MONTALBÁN', 'municipio_id' => 84],
            //MUN_NAGUANAGUA (85)
            ['nombre' => 'NAGUANAGUA', 'municipio_id' => 85],
            //MUN_PUERTO_CABELLO (86)
            ['nombre' => 'BARTOLOMÉ SALÓM', 'municipio_id' => 86],
            ['nombre' => 'DEMOCRACIA', 'municipio_id' => 86],
            ['nombre' => 'FRATERNIDAD', 'municipio_id' => 86],
            ['nombre' => 'GOAIGOAZA', 'municipio_id' => 86],
            ['nombre' => 'JUAN JOSÉ FLORES', 'municipio_id' => 86],
            ['nombre' => 'UNIÓN', 'municipio_id' => 86],
            ['nombre' => 'BORBURATA', 'municipio_id' => 86],
            ['nombre' => 'PATANEMO', 'municipio_id' => 86],
            //MUN_SAN_DIEGO (87)
            ['nombre' => 'SAN DIEGO', 'municipio_id' => 87],
            //MUN_SAN_JOAQUÍN (88)
            ['nombre' => 'SAN JOAQUÍN', 'municipio_id' => 88],
            //MUN_VALENCIA (89)
            ['nombre' => 'CANDELARIA', 'municipio_id' => 89],
            ['nombre' => 'CATEDRAL', 'municipio_id' => 89],
            ['nombre' => 'EL SOCORRO', 'municipio_id' => 89],
            ['nombre' => 'MIGUEL PEÑA', 'municipio_id' => 89],
            ['nombre' => 'RAFAEL URDANETA', 'municipio_id' => 89],
            ['nombre' => 'SAN BLAS', 'municipio_id' => 89],
            ['nombre' => 'SAN JOSÉ', 'municipio_id' => 89],
            ['nombre' => 'SANTA ROSA', 'municipio_id' => 89],
            ['nombre' => 'NEGRO PRIMERO', 'municipio_id' => 89],
            
            //---Cojedes---

            //MUN_ANZOÁTEGUI (90)
            ['nombre' => 'COJEDES', 'municipio_id' => 90],
            ['nombre' => 'JUAN DE MATA SUÁREZ', 'municipio_id' => 90],
            //MUN_PAO_DE_SAN_JUAN_BAUTISTA (91)
            ['nombre' => 'EL PAO', 'municipio_id' => 91],
            //MUN_TINAQUILLO (92)
            ['nombre' => 'TINAQUILLO', 'municipio_id' => 92],
            //MUN_GIRARDOT (93)
            ['nombre' => 'EL BAÚL', 'municipio_id' => 93],
            ['nombre' => 'SUCRE', 'municipio_id' => 93],
            //MUN_LIMA_BLANCO (94)
            ['nombre' => 'LA AGUADITA', 'municipio_id' => 94],
            ['nombre' => 'MACAPO', 'municipio_id' => 94],
            //MUN_RICAURTE (95)
            ['nombre' => 'EL AMPARO', 'municipio_id' => 95],
            ['nombre' => 'LIBERTAD DE COJEDES', 'municipio_id' => 95],
            //MUN_RÓMULO_GALLEGOS (96)
            ['nombre' => 'RÓMULO GALLEGOS', 'municipio_id' => 96],
            //MUN_SAN_CARLOS (97)
            ['nombre' => 'SAN CARLOS DE AUSTRIA', 'municipio_id' => 97],
            ['nombre' => 'JUAN ÁNGEL BRAVO', 'municipio_id' => 97],
            ['nombre' => 'MANUEL MANRIQUE', 'municipio_id' => 97],
            //MUN_TINACO (98)
            ['nombre' => 'GENERAL EN JEFE JOSÉ LAURENCIO SILVA', 'municipio_id' => 98],
            
            //---Delta Amacuro---

            //MUN_ANTONIO_DÍAZ (99)
            ['nombre' => 'CURIAPO', 'municipio_id' => 99],
            ['nombre' => 'ALMIRANTE LUIS BRIÓN', 'municipio_id' => 99],
            ['nombre' => 'FRANCISCO ANICETO LUGO', 'municipio_id' => 99],
            ['nombre' => 'BOCA DE CUYUBINI', 'municipio_id' => 99],
            ['nombre' => 'MANUEL RENAUD', 'municipio_id' => 99],
            ['nombre' => 'PADRE BARRAL', 'municipio_id' => 99],
            ['nombre' => 'SANTOS DE ABELGAS', 'municipio_id' => 99],
            //MUN_CASACOIMA (100)
            ['nombre' => 'IMATACA', 'municipio_id' => 100],
            ['nombre' => 'MORUCA', 'municipio_id' => 100],
            ['nombre' => 'CINCO DE JULIO', 'municipio_id' => 100],
            ['nombre' => 'PIACOA', 'municipio_id' => 100],
            ['nombre' => 'JUAN BAUTISTA ARISMENDI', 'municipio_id' => 100],
            ['nombre' => 'MANUEL PIAR SANTA CATALINA', 'municipio_id' => 100],
            ['nombre' => 'RÓMULO GALLEGOS', 'municipio_id' => 100],
            //MUN_PEDERNALES (101)
            ['nombre' => 'PEDERNALES', 'municipio_id' => 101],
            ['nombre' => 'LUIS BELTRÁN PRIETO FIGUEROA', 'municipio_id' => 101],
            //MUN_TUCUPITA (102)
            ['nombre' => 'SAN JOSÉ', 'municipio_id' => 102],
            ['nombre' => 'JOSÉ VIDAL MARCANO', 'municipio_id' => 102],
            ['nombre' => 'JUAN MILLÁN', 'municipio_id' => 102],
            ['nombre' => 'LEONARDO RUÍZPINEDA PALOMA', 'municipio_id' => 102],
            ['nombre' => 'MARISCAL ANTONIO JOSÉ DE SUCRE', 'municipio_id' => 102],
            ['nombre' => 'MONSEÑOR ARGIMIRO GARCÍA', 'municipio_id' => 102],
            ['nombre' => 'SAN RAFAEL', 'municipio_id' => 102],
            ['nombre' => 'VIRGEN DEL VALLE LA HORQUETA', 'municipio_id' => 102],

            //--- Distrito Capital ---

            //MUN_LIBERTADOR_DC (103)
            ['nombre' => '23 DE ENERO', 'municipio_id' => 103],
            ['nombre' => 'ALTAGRACIA', 'municipio_id' => 103],
            ['nombre' => 'ANTÍMANO', 'municipio_id' => 103],
            ['nombre' => 'CARICUAO', 'municipio_id' => 103],
            ['nombre' => 'CATEDRAL', 'municipio_id' => 103],
            ['nombre' => 'COCHE', 'municipio_id' => 103],
            ['nombre' => 'EL JUNQUITO', 'municipio_id' => 103],
            ['nombre' => 'EL PARAÍSO', 'municipio_id' => 103],
            ['nombre' => 'EL RECREO', 'municipio_id' => 103],
            ['nombre' => 'EL VALLE', 'municipio_id' => 103],
            ['nombre' => 'CANDELARIA', 'municipio_id' => 103],
            ['nombre' => 'LA PASTORA', 'municipio_id' => 103],
            ['nombre' => 'LA VEGA', 'municipio_id' => 103],
            ['nombre' => 'MACARAO', 'municipio_id' => 103],
            ['nombre' => 'SAN AGUSTÍN', 'municipio_id' => 103],
            ['nombre' => 'SAN BERNARDINO', 'municipio_id' => 103],
            ['nombre' => 'SAN JOSÉ', 'municipio_id' => 103],
            ['nombre' => 'SAN JUAN', 'municipio_id' => 103],
            ['nombre' => 'SAN PEDRO', 'municipio_id' => 103],
            ['nombre' => 'SANTA ROSALÍA', 'municipio_id' => 103],
            ['nombre' => 'SANTA TERESA', 'municipio_id' => 103],
            ['nombre' => 'SUCRE (CATIA)', 'municipio_id' => 103],
            
            //---Falcon---

            //MUN_ACOSTA_FA (104)
            ['nombre' => 'CAPADARE', 'municipio_id' => 104],
            ['nombre' => 'LA PASTORA', 'municipio_id' => 104],
            ['nombre' => 'LIBERTADOR', 'municipio_id' => 104],
            ['nombre' => 'SAN JUAN DE LOS CAYOS', 'municipio_id' => 104],
            //MUN_BOLÍVAR_FA (105)
            ['nombre' => 'ARACUA', 'municipio_id' => 105],
            ['nombre' => 'LA PEÑA', 'municipio_id' => 105],
            ['nombre' => 'SAN LUIS', 'municipio_id' => 105],
            //MUN_BUCHIVACOA (106)
            ['nombre' => 'BARIRO', 'municipio_id' => 106],
            ['nombre' => 'BOROJÓ', 'municipio_id' => 106],
            ['nombre' => 'CAPATÁRIDA', 'municipio_id' => 106],
            //MUN_CACIQUE_MANAURE (107)
            ['nombre' => 'CACIQUE MANAURE', 'municipio_id' => 107],
            //MUN_CARIRUBANA (108)
            ['nombre' => 'NORTE', 'municipio_id' => 108],
            ['nombre' => 'CARIRUBANA', 'municipio_id' => 108],
            ['nombre' => 'SANTA ANA', 'municipio_id' => 108],
            ['nombre' => 'PUNTA CARDÓN', 'municipio_id' => 108],
            //MUN_COLINA (109)
            ['nombre' => 'LA VELA DE CORO', 'municipio_id' => 109],
            ['nombre' => 'ACURIGUA', 'municipio_id' => 109],
            ['nombre' => 'GUAIBACOA', 'municipio_id' => 109],
            ['nombre' => 'LAS CALDERAS', 'municipio_id' => 109],
            //MUN_DABAJURO (110)
            ['nombre' => 'DABAJURO', 'municipio_id' => 110],
            ['nombre' => 'PEDREGAL', 'municipio_id' => 110],
            //MUN_DEMOCRACIA (111)
            ['nombre' => 'AGUA CLARA', 'municipio_id' => 111],
            ['nombre' => 'AVARIA', 'municipio_id' => 111],
            ['nombre' => 'BARAIVED', 'municipio_id' => 111],
            //MUN_FALCÓN (112)
            ['nombre' => 'ADAURE', 'municipio_id' => 112],
            ['nombre' => 'ADÍCORA', 'municipio_id' => 112],
            ['nombre' => 'BUENA VISTA', 'municipio_id' => 112],
            ['nombre' => 'INDEPENDENCIA', 'municipio_id' => 112],
            //MUN_FEDERACIÓN (113)
            ['nombre' => 'AGUA LARGA', 'municipio_id' => 113],
            ['nombre' => 'CHURUGUARA', 'municipio_id' => 113],
            ['nombre' => 'EL PAUJÍ', 'municipio_id' => 113],
            //MUN_JACURA (114)
            ['nombre' => 'AGUA LINDA', 'municipio_id' => 114],
            ['nombre' => 'ARAURIMA', 'municipio_id' => 114],
            ['nombre' => 'JACURA', 'municipio_id' => 114],
            //MUN_LOS_TAQUES (115)
            ['nombre' => 'LOS TAQUES', 'municipio_id' => 115],
            ['nombre' => 'JUDIBANA', 'municipio_id' => 115],
            //MUN_MAUROA (116)
            ['nombre' => 'MENE DE MAUROA', 'municipio_id' => 116],
            ['nombre' => 'SAN FÉLIX', 'municipio_id' => 116],
            ['nombre' => 'CASIGUA', 'municipio_id' => 116],
            //MUN_MIRANDA (117)
            ['nombre' => 'GUZMÁN GUILLERMO', 'municipio_id' => 117],
            ['nombre' => 'MITARE', 'municipio_id' => 117],
            ['nombre' => 'RÍO SECO', 'municipio_id' => 117],
            //MUN_MONSEÑOR_ITURRIZA (118)
            ['nombre' => 'BOCA DEL TOCUYO', 'municipio_id' => 118],
            ['nombre' => 'CHICHIRIVICHE', 'municipio_id' => 118],
            ['nombre' => 'TOCUYO DE LA COSTA', 'municipio_id' => 118],
            //MUN_PALMASOLA (119)
            ['nombre' => 'PALMASOLA', 'municipio_id' => 119],
            //MUN_PETIT (120)
            ['nombre' => 'CABURE', 'municipio_id' => 120],
            ['nombre' => 'COLINA', 'municipio_id' => 120],
            ['nombre' => 'CURIMAGUA', 'municipio_id' => 120],
            //MUN_PÍRITU (121)
            ['nombre' => 'SAN JOSÉ DE LA COSTA', 'municipio_id' => 121],
            ['nombre' => 'PÍRITU', 'municipio_id' => 121],
            //MUN_SAN_FRANCISCO (122)
            ['nombre' => 'CAPITAL SAN FRANCISCO', 'municipio_id' => 122],
            //MUN_JOSÉ_LAURENCIO_SILVA (123)
            ['nombre' => 'TUCACAS', 'municipio_id' => 123],
            ['nombre' => 'BOCA DE ARROA', 'municipio_id' => 123],
            ['nombre' => 'BOCA DE AROA', 'municipio_id' => 123],
            //MUN_SUCRE (124)
            ['nombre' => 'SUCRE', 'municipio_id' => 124],
            ['nombre' => 'PECAYA', 'municipio_id' => 124],
            //MUN_TOCÓPERO (125)
            ['nombre' => 'TOCÓPERO', 'municipio_id' => 125],
            //MUN_UNIÓN (126)
            ['nombre' => 'EL CHARAL', 'municipio_id' => 126],
            ['nombre' => 'LAS VEGAS DEL TUY', 'municipio_id' => 126],
            //MUN_URUMACO (127)
            ['nombre' => 'URUMACO', 'municipio_id' => 127],
            ['nombre' => 'LA CIÉNAGA', 'municipio_id' => 127],
            //MUN_ZAMORA (128)
            ['nombre' => 'PUERTO CUMAREBO', 'municipio_id' => 128],
            ['nombre' => 'PUEBLO CUMAREBO', 'municipio_id' => 128],
            ['nombre' => 'LA SOLEDAD', 'municipio_id' => 128],
            ['nombre' => 'SANTA CRUZ DE BUCARAL', 'municipio_id' => 128],
            ['nombre' => 'SEQUE', 'municipio_id' => 128],
            ['nombre' => 'MACORUCA', 'municipio_id' => 128],
            ['nombre' => 'PURURECHE', 'municipio_id' => 128],
            ['nombre' => 'JADACAQUIVA', 'municipio_id' => 128],
            ['nombre' => 'MAPARARÍ', 'municipio_id' => 128],
            ['nombre' => 'SAN ANTONIO', 'municipio_id' => 128],
            ['nombre' => 'ZAZÁRIDA', 'municipio_id' => 128],
            ['nombre' => 'EL VÍNCULO', 'municipio_id' => 128],
            ['nombre' => 'SAN GABRIEL', 'municipio_id' => 128],
            ['nombre' => 'VALLE DE EROA', 'municipio_id' => 128],
            ['nombre' => 'EL HATO', 'municipio_id' => 128],
            ['nombre' => 'SANTA ANA', 'municipio_id' => 128],
            ['nombre' => 'MORUY', 'municipio_id' => 128],
            ['nombre' => 'PUEBLO NUEVO', 'municipio_id' => 128],


            //---Guárico---


            //MUN_CAMAGUÁN (129)
            ['nombre' => 'CAMAGUÁN', 'municipio_id' => 129],
            ['nombre' => 'PUERTO MIRANDA', 'municipio_id' => 129],
            ['nombre' => 'UVERITO', 'municipio_id' => 129],
            //MUN_CHAGUARAMAS (130)
            ['nombre' => 'CHAGUARAMAS', 'municipio_id' => 130],
            //MUN_EL_SOCORRO (131)
            ['nombre' => 'EL SOCORRO', 'municipio_id' => 131],
            //MUN_SEBASTIÁN FRANCISCO DE MIRANDA (132)
            ['nombre' => 'EL CALVARIO', 'municipio_id' => 132],
            ['nombre' => 'EL RASTRO', 'municipio_id' => 132],
            ['nombre' => 'GUARDATINAJAS', 'municipio_id' => 132],
            ['nombre' => 'CALABOZO', 'municipio_id' => 132],
            //MUN_JOSÉ_FÉLIX_RIBAS (133)
            ['nombre' => 'TUCUPIDO', 'municipio_id' => 133],
            ['nombre' => 'SAN RAFAEL DE LAYA', 'municipio_id' => 133],
            //MUN_JOSÉ_TADEO_MONAGAS (134)
            ['nombre' => 'ALTAGRACIA DE ORITUCO', 'municipio_id' => 134],
            ['nombre' => 'SAN RAFAEL DE ORITUCO', 'municipio_id' => 134],
            ['nombre' => 'SAN FRANCISCO JAVIER DE LEZAMA', 'municipio_id' => 134],
            ['nombre' => 'PASO REAL DE MACAIRA', 'municipio_id' => 134],
            ['nombre' => 'CARLOS SOUBLETTE', 'municipio_id' => 134],
            ['nombre' => 'SAN FRANCISCO DE MACAIRA', 'municipio_id' => 134],
            ['nombre' => 'LIBERTAD DE ORITUCO', 'municipio_id' => 134],
            //MUN_JUAN_GERMÁN_ROSCIO (135)
            ['nombre' => 'CANTAGALLO', 'municipio_id' => 135],
            ['nombre' => 'SAN JUAN DE LOS MORROS', 'municipio_id' => 135],
            ['nombre' => 'PARAPARA', 'municipio_id' => 135],
            //MUN_JULIÁN_MELLADO (136)
            ['nombre' => 'EL SOMBRERO', 'municipio_id' => 136],
            ['nombre' => 'SOSA', 'municipio_id' => 136],
            //MUN_LAS_MERCEDES (137)
            ['nombre' => 'LAS MERCEDES', 'municipio_id' => 137],
            ['nombre' => 'CABRUTA', 'municipio_id' => 137],
            ['nombre' => 'SANTA RITA DE MANAPIRE', 'municipio_id' => 137],
            //MUN_LEONARDO_INFANTE (138)
            ['nombre' => 'VALLE DE LA PASCUA', 'municipio_id' => 138],
            ['nombre' => 'ESPINO', 'municipio_id' => 138],
            //MUN_ORTIZ (139)
            ['nombre' => 'SAN JOSÉ DE TIZNADOS', 'municipio_id' => 139],
            ['nombre' => 'SAN FRANCISCO DE TIZNADOS', 'municipio_id' => 139],
            ['nombre' => 'SAN LORENZO DE TIZNADOS', 'municipio_id' => 139],
            ['nombre' => 'ORTIZ', 'municipio_id' => 139],
            //MUN_PEDRO_ZARAZA (140)
            ['nombre' => 'SAN JOSÉ DE UNARE', 'municipio_id' => 140],
            ['nombre' => 'ZARAZA', 'municipio_id' => 140],
            //MUN_SAN_GERÓNIMO_DE_GUAYABAL (141)
            ['nombre' => 'GUAYABAL', 'municipio_id' => 141],
            ['nombre' => 'CAZORLA', 'municipio_id' => 141],
            //MUN_SAN_JOSÉ_DE_GUARIBE (142)
            ['nombre' => 'SAN JOSÉ DE GUARIBE', 'municipio_id' => 142],
            ['nombre' => 'UVERAL', 'municipio_id' => 142],
            //MUN_SANTA_MARÍA_DE_IPIRE (143)
            ['nombre' => 'SANTA MARÍA DE IPIRE', 'municipio_id' => 143],
            ['nombre' => 'ALTAMIRA', 'municipio_id' => 143],

            //---Lara---

            //MUN_ANDRÉSELOY_BLANCO_LA (144)
            ['nombre' => 'QUEBRADA HONDA DE GUACHE', 'municipio_id' => 144],
            ['nombre' => 'PIO TAMAYO', 'municipio_id' => 144],
            ['nombre' => 'YACAMBÚ', 'municipio_id' => 144],
            //MUN_CRESPO (145)
            ['nombre' => 'FREITEZ', 'municipio_id' => 145],
            ['nombre' => 'JOSÉ MARÍA BLANCO', 'municipio_id' => 145],
            //MUN_MORÁN (146)
            ['nombre' => 'ANZOÁTEGUI', 'municipio_id' => 146],
            ['nombre' => 'BOLÍVAR', 'municipio_id' => 146],
            ['nombre' => 'GUÁRICO', 'municipio_id' => 146],
            ['nombre' => 'HILARIO LUNA Y LUNA', 'municipio_id' => 146],
            ['nombre' => 'HUMOCARO BAJO', 'municipio_id' => 146],
            ['nombre' => 'HUMOCARO ALTO', 'municipio_id' => 146],
            ['nombre' => 'LA CANDELARIA', 'municipio_id' => 146],
            ['nombre' => 'MORÁN', 'municipio_id' => 146],
            //MUN_PALAVECINO (147)
            ['nombre' => 'CABUDARE', 'municipio_id' => 147],
            ['nombre' => 'JOSÉ GREGORIO BASTIDAS', 'municipio_id' => 147],
            ['nombre' => 'AGUA VIVA', 'municipio_id' => 147],
            //MUN_SIMÓN_PLANAS (148)
            ['nombre' => 'BURÍA', 'municipio_id' => 148],
            ['nombre' => 'GUSTAVO VEGA', 'municipio_id' => 148],
            ['nombre' => 'SARARE', 'municipio_id' => 148],
            //MUN_TORRES (149)
            ['nombre' => 'ALTAGRACIA', 'municipio_id' => 149],
            ['nombre' => 'ANTONIO DÍAZ', 'municipio_id' => 149],
            ['nombre' => 'CAMACARO', 'municipio_id' => 149],
            ['nombre' => 'CASTAÑEDA', 'municipio_id' => 149],
            ['nombre' => 'CECILIO ZUBILLAGA', 'municipio_id' => 149],
            ['nombre' => 'CHIQUINQUIRA', 'municipio_id' => 149],
            ['nombre' => 'EL BLANCO', 'municipio_id' => 149],
            ['nombre' => 'ESPINOZA DE LOS MONTEROS', 'municipio_id' => 149],
            ['nombre' => 'HERIBERTO ARROLLO', 'municipio_id' => 149],
            ['nombre' => 'LARA', 'municipio_id' => 149],
            ['nombre' => 'LAS MERCEDES', 'municipio_id' => 149],
            ['nombre' => 'MANUEL MORILLO', 'municipio_id' => 149],
            ['nombre' => 'MONTAÑA VERDE', 'municipio_id' => 149],
            ['nombre' => 'MONTES DE OCA', 'municipio_id' => 149],
            ['nombre' => 'REYES DE VARGAS', 'municipio_id' => 149],
            ['nombre' => 'TORRES', 'municipio_id' => 149],
            ['nombre' => 'TRINIDAD SAMUEL', 'municipio_id' => 149],
            //MUN_URDANETA_LA (150)
            ['nombre' => 'XAGUAS', 'municipio_id' => 150],
            ['nombre' => 'SIQUISIQUE', 'municipio_id' => 150],
            ['nombre' => 'SAN MIGUEL', 'municipio_id' => 150],
            ['nombre' => 'MOROTURO', 'municipio_id' => 150],
            //MUN_IRIBARREN (151)
            ['nombre' => 'AGUEDO FELIPE ALVARADO', 'municipio_id' => 151],
            ['nombre' => 'BUENA VISTA', 'municipio_id' => 151],
            ['nombre' => 'CATEDRAL', 'municipio_id' => 151],
            ['nombre' => 'CONCEPCIÓN', 'municipio_id' => 151],
            ['nombre' => 'EL CUJÍ', 'municipio_id' => 151],
            ['nombre' => 'JUÁREZ', 'municipio_id' => 151],
            ['nombre' => 'JUAN DE VILLEGAS', 'municipio_id' => 151],
            ['nombre' => 'SANTA ROSA', 'municipio_id' => 151],
            ['nombre' => 'TAMACA', 'municipio_id' => 151],
            ['nombre' => 'UNIÓN', 'municipio_id' => 151],
            //MUN_JIMÉNEZ (152)
            ['nombre' => 'CUARA', 'municipio_id' => 152],
            ['nombre' => 'DIEGO DE LOZADA', 'municipio_id' => 152],
            ['nombre' => 'JOSÉ BERNARDO DORANTE', 'municipio_id' => 152],
            ['nombre' => 'JUAN B. RODRÍGUEZ', 'municipio_id' => 152],
            ['nombre' => 'MARIANO PERAZA', 'municipio_id' => 152],
            ['nombre' => 'PARAÍSO DE SAN JOSÉ', 'municipio_id' => 152],
            ['nombre' => 'SAN MIGUEL', 'municipio_id' => 152],
            ['nombre' => 'TINTORERO', 'municipio_id' => 152],

            //--- La Guaira ---

            ['nombre' => 'CARABALLEDA', 'municipio_id' => 153],
            ['nombre' => 'CARAYACA', 'municipio_id' => 153],
            ['nombre' => 'CARLOS SOUBLETTE', 'municipio_id' => 153],
            ['nombre' => 'CARUAO', 'municipio_id' => 153],
            ['nombre' => 'CHUSPA', 'municipio_id' => 153],
            ['nombre' => 'CATIA LA MAR', 'municipio_id' => 153],
            ['nombre' => 'EL JUNKO', 'municipio_id' => 153],
            ['nombre' => 'LA GUAIRA', 'municipio_id' => 153],
            ['nombre' => 'MACUTO', 'municipio_id' => 153],
            ['nombre' => 'MAIQUETÍA', 'municipio_id' => 153],
            ['nombre' => 'NAIGUATÁ', 'municipio_id' => 153],
            ['nombre' => 'URIMARE', 'municipio_id' => 153],
            
            //---Merida---

            //MUN_ALBERTO_ADRIANI (154)
            ['nombre' => 'Presidente Betancourt', 'municipio_id' => 154],
            ['nombre' => 'Presidente Páez', 'municipio_id' => 154],
            ['nombre' => 'Presidente Rómulo Gallegos', 'municipio_id' => 154],
            ['nombre' => 'Gabriel Picón González', 'municipio_id' => 154],
            ['nombre' => 'Héctor Amable Mora', 'municipio_id' => 154],
            ['nombre' => 'José Nucete Sardi', 'municipio_id' => 154],
            ['nombre' => 'Pulido Méndez', 'municipio_id' => 154],
            //MUN_ANTONIO_PINTO_SALINAS (155)
            ['nombre' => 'Santa Cruz de Mora', 'municipio_id' => 155],
            ['nombre' => 'Mesa Bolívar', 'municipio_id' => 155],
            ['nombre' => 'Mesa de las Palmas', 'municipio_id' => 155],
            //MUN_ANDRÉS BELLO (156)
            ['nombre' => 'La Azulita', 'municipio_id' => 156],
            //MUN_ARICAGUA (157)
            ['nombre' => 'Aricagua', 'municipio_id' => 157],
            ['nombre' => 'San Antonio', 'municipio_id' => 157],
            //MUN_ARZOBISPO_CHACÓN (158)
            ['nombre' => 'Canagua', 'municipio_id' => 158],
            ['nombre' => 'Capurí', 'municipio_id' => 158],
            ['nombre' => 'Chacantá', 'municipio_id' => 158],
            ['nombre' => 'El Molino', 'municipio_id' => 158],
            ['nombre' => 'Guaimaral', 'municipio_id' => 158],
            ['nombre' => 'Mucutuy', 'municipio_id' => 158],
            ['nombre' => 'Mucuchachí', 'municipio_id' => 158],
            //MUN_CAMPO ELÍAS (159)
            ['nombre' => 'Fernández Peña', 'municipio_id' => 159],
            ['nombre' => 'Matriz', 'municipio_id' => 159],
            ['nombre' => 'Montalbán', 'municipio_id' => 159],
            ['nombre' => 'Acequias', 'municipio_id' => 159],
            ['nombre' => 'Jají', 'municipio_id' => 159],
            ['nombre' => 'La Mesa', 'municipio_id' => 159],
            ['nombre' => 'San José del Sur', 'municipio_id' => 159],
            //MUN_CARACCIOLO PARRA OLMEDO (160)
            ['nombre' => 'Tucaní', 'municipio_id' => 160],
            ['nombre' => 'Florencio Ramírez', 'municipio_id' => 160],
            //MUN_CARDENAL QUINTERO (161)
            ['nombre' => 'Santo Domingo', 'municipio_id' => 161],
            ['nombre' => 'Las Piedras', 'municipio_id' => 161],
            ['nombre' => 'Mesa de Quintero', 'municipio_id' => 161],
            //MUN_GUARAQUE (162)
            ['nombre' => 'Guaraque', 'municipio_id' => 162],
            ['nombre' => 'Mesa de Quintero', 'municipio_id' => 162],
            ['nombre' => 'Río Negro', 'municipio_id' => 162],
            //MUN_JULIO CÉSAR SALAS (163)
            ['nombre' => 'Arapuey', 'municipio_id' => 163],
            ['nombre' => 'Palmira', 'municipio_id' => 163],
            //MUN_JUSTO BRICEÑO (164)
            ['nombre' => 'San Cristóbal de Torondoy', 'municipio_id' => 164],
            ['nombre' => 'Torondoy', 'municipio_id' => 164],
            //MUN_LIBERTADOR_ME (165)
            ['nombre' => 'Antonio Spinetti Dini', 'municipio_id' => 165],
            ['nombre' => 'Arias', 'municipio_id' => 165],
            ['nombre' => 'Caracciolo Parra Pérez', 'municipio_id' => 165],
            ['nombre' => 'Domingo Peña', 'municipio_id' => 165],
            ['nombre' => 'El Llano', 'municipio_id' => 165],
            ['nombre' => 'Gonzalo Picón Febres', 'municipio_id' => 165],
            ['nombre' => 'Jacinto Plaza', 'municipio_id' => 165],
            ['nombre' => 'Juan Rodríguez Suárez', 'municipio_id' => 165],
            ['nombre' => 'Lasso de la Vega', 'municipio_id' => 165],
            ['nombre' => 'Mariano Picón Salas', 'municipio_id' => 165],
            ['nombre' => 'Milla', 'municipio_id' => 165],
            ['nombre' => 'Osuna Rodríguez', 'municipio_id' => 165],
            ['nombre' => 'Sagrario', 'municipio_id' => 165],
            ['nombre' => 'El Morro', 'municipio_id' => 165],
            ['nombre' => 'Los Nevados', 'municipio_id' => 165],
            //MUN_MIRANDA_ME (166)
            ['nombre' => 'Andrés Eloy Blanco', 'municipio_id' => 166],
            ['nombre' => 'Piñango', 'municipio_id' => 166],
            ['nombre' => 'Timotes', 'municipio_id' => 166],
            //MUN_OBISPO RAMOS DE LORA (167)
            ['nombre' => 'Eloy Paredes', 'municipio_id' => 167],
            ['nombre' => 'San Rafael de Alcázar', 'municipio_id' => 167],
            ['nombre' => 'Santa Elena de Arenales', 'municipio_id' => 167],
            //MUN_PADRE NOGUERA (168)
            ['nombre' => 'Santa María de Caparo', 'municipio_id' => 168],
            //MUN_PUEBLO LLANO (169)
            ['nombre' => 'Pueblo Llano', 'municipio_id' => 169],
            //MUN_RANGEL (170)
            ['nombre' => 'Cacute', 'municipio_id' => 170],
            ['nombre' => 'La Toma', 'municipio_id' => 170],
            ['nombre' => 'Mucurubá', 'municipio_id' => 170],
            ['nombre' => 'San Rafael', 'municipio_id' => 170],
            ['nombre' => 'Pueblo Nuevo del Sur', 'municipio_id' => 170],
            //MUN_RIVAS DÁVILA (171)
            ['nombre' => 'Gerónimo Maldonado', 'municipio_id' => 171],
            ['nombre' => 'Bailadores', 'municipio_id' => 171],
            //MUN_SANTOS MARQUINA (172)
            ['nombre' => 'Tabay', 'municipio_id' => 172],
            //MUN_SUCRE_ME (173)
            ['nombre' => 'Chiguará', 'municipio_id' => 173],
            ['nombre' => 'Estánquez', 'municipio_id' => 173],
            ['nombre' => 'Lagunillas', 'municipio_id' => 173],
            ['nombre' => 'La Trampa', 'municipio_id' => 173],
            //MUN_TOVAR (174)
            ['nombre' => 'El Amparo', 'municipio_id' => 174],
            ['nombre' => 'El Llano', 'municipio_id' => 174],
            ['nombre' => 'San Francisco', 'municipio_id' => 174],
            ['nombre' => 'Tovar', 'municipio_id' => 174],
            ['nombre' => 'Pueblo Nuevo del Sur', 'municipio_id' => 174],
            //MUN_TULIO FEBRES CORDERO (175)
            ['nombre' => 'Independencia', 'municipio_id' => 175],
            ['nombre' => 'María de la Concepción Palacios Blanco', 'municipio_id' => 175],
            ['nombre' => 'Santa Apolonia', 'municipio_id' => 175],
            //MUN_ZEA (176)
            ['nombre' => 'Caño El Tigre', 'municipio_id' => 176],
            ['nombre' => 'Zea', 'municipio_id' => 176],
            
            //---Miranda---

            //MUN_ACEVEDO (177)
            ['nombre' => 'Aragüita', 'municipio_id' => 177],
            ['nombre' => 'Capaya', 'municipio_id' => 177],
            ['nombre' => 'Caucagua', 'municipio_id' => 177],
            ['nombre' => 'El Café', 'municipio_id' => 177],
            ['nombre' => 'Marizapa', 'municipio_id' => 177],
            ['nombre' => 'Panaquire', 'municipio_id' => 177],
            ['nombre' => 'Ribas', 'municipio_id' => 177],

            //MUN_ANDRÉS_BELLO_MI (178)
            ['nombre' => 'Arévalo González', 'municipio_id' => 178],
            ['nombre' => 'San José de Barlovento', 'municipio_id' => 178],

            //MUN_BARUTA (179)
            ['nombre' => 'Las Minas', 'municipio_id' => 179],
            ['nombre' => 'Nuestra Señora del Rosario', 'municipio_id' => 179],
            ['nombre' => 'El Cafetal', 'municipio_id' => 179],

            //MUN_BRIÓN (180)
            ['nombre' => 'Higuerote', 'municipio_id' => 180],
            ['nombre' => 'Curiepe', 'municipio_id' => 180],
            ['nombre' => 'Tacarigua de Brión', 'municipio_id' => 180],

            //MUN_BUROZ (181)
            ['nombre' => 'Mamporal', 'municipio_id' => 181],

            //MUN_CARRIZAL (182)
            ['nombre' => 'Carrizal', 'municipio_id' => 182],

            //MUN_CHACAO (183)
            ['nombre' => 'Chacao', 'municipio_id' => 183],

            //MUN_CRISTÓBAL_ROJAS (184)
            ['nombre' => 'Charallave', 'municipio_id' => 184],
            ['nombre' => 'Las Brisas', 'municipio_id' => 184],

            //MUN_EL_HATILLO (185)
            ['nombre' => 'El Hatillo', 'municipio_id' => 185],

            //MUN_GUAICAIPURO (186)
            ['nombre' => 'Los Teques', 'municipio_id' => 186],
            ['nombre' => 'Altagracia de la Montaña', 'municipio_id' => 186],
            ['nombre' => 'Cecilio Acosta', 'municipio_id' => 186],
            ['nombre' => 'El Jarillo', 'municipio_id' => 186],
            ['nombre' => 'Paracotos', 'municipio_id' => 186],
            ['nombre' => 'San Pedro', 'municipio_id' => 186],
            ['nombre' => 'Tacata', 'municipio_id' => 186],

            //MUN_INDEPENDENCIA_MI (187)
            ['nombre' => 'Santa Teresa del Tuy', 'municipio_id' => 187],
            ['nombre' => 'El Cartanal', 'municipio_id' => 187],

            //MUN_LANDER (188)
            ['nombre' => 'Ocumare del Tuy', 'municipio_id' => 188],
            ['nombre' => 'La Democracia', 'municipio_id' => 188],
            ['nombre' => 'San Francisco de Yare', 'municipio_id' => 188],

            //MUN_LOS_SALIAS (189)
            ['nombre' => 'San Antonio de los Altos', 'municipio_id' => 189],

            //MUN_PÁEZ (190)
            ['nombre' => 'Río Chico', 'municipio_id' => 190],
            ['nombre' => 'El Guapo', 'municipio_id' => 190],
            ['nombre' => 'Paparo', 'municipio_id' => 190],
            ['nombre' => 'San Fernando del Guapo', 'municipio_id' => 190],
            ['nombre' => 'Tacarigua de la Laguna', 'municipio_id' => 190],
            ['nombre' => 'Machurucuto', 'municipio_id' => 190],

            //MUN_PAZ_CASTILLO (191)
            ['nombre' => 'Santa Lucía del Tuy', 'municipio_id' => 191],

            //MUN_PEDRO_GUAL (192)
            ['nombre' => 'Cúpira', 'municipio_id' => 192],
            ['nombre' => 'El Guapo', 'municipio_id' => 192],

            //MUN_PLAZA (193)
            ['nombre' => 'Guarenas', 'municipio_id' => 193],
            ['nombre' => 'San Antonio de Yare', 'municipio_id' => 193],

            //MUN_SIMÓN_BOLÍVAR_MI (194)
            ['nombre' => 'San Francisco de Yare', 'municipio_id' => 194],

            //MUN_URDANETA_MI (195)
            ['nombre' => 'Cúa', 'municipio_id' => 195],
            ['nombre' => 'Nueva Cúa', 'municipio_id' => 195],

            //MUN_SUCRE_MI (196)
            ['nombre' => 'Petare', 'municipio_id' => 196],
            ['nombre' => 'Bolívar', 'municipio_id' => 196],
            ['nombre' => 'Caucagüita', 'municipio_id' => 196],
            ['nombre' => 'Filas de Mariche', 'municipio_id' => 196],
            ['nombre' => 'La Dolorita', 'municipio_id' => 196],
            ['nombre' => 'Leoncio Martínez', 'municipio_id' => 196],
            ['nombre' => 'Santa Bárbara', 'municipio_id' => 196],

            //MUN_ZAMORA_MI (197)
            ['nombre' => 'Guatire', 'municipio_id' => 197],
            ['nombre' => 'Araira', 'municipio_id' => 197],
            //Monagas

            //MUN_ACOSTA (198)
            ['nombre' => 'San Antonio de Maturín', 'municipio_id' => 198],
            ['nombre' => 'San Francisco de Maturín', 'municipio_id' => 198],

            //MUN_AGUASAY (199)
            ['nombre' => 'Aguasay', 'municipio_id' => 199],

            //MUN_BOLÍVAR_MO (200)
            ['nombre' => 'Caripito', 'municipio_id' => 200],

            //MUN_CARIPE (201)
            ['nombre' => 'El Guácharo', 'municipio_id' => 201],
            ['nombre' => 'La Guanota', 'municipio_id' => 201],
            ['nombre' => 'Sabana de Piedra', 'municipio_id' => 201],
            ['nombre' => 'San Agustín', 'municipio_id' => 201],
            ['nombre' => 'Teresen', 'municipio_id' => 201],
            ['nombre' => 'Caripe', 'municipio_id' => 201],

            //MUN_CEDEÑO (202)
            ['nombre' => 'Areo', 'municipio_id' => 202],
            ['nombre' => 'Cedeño', 'municipio_id' => 202],
            ['nombre' => 'San Félix de Cantalicio', 'municipio_id' => 202],
            ['nombre' => 'Viento Fresco', 'municipio_id' => 202],

            //MUN_EZEQUIEL_ZAMORA (203)
            ['nombre' => 'El Tejero', 'municipio_id' => 203],
            ['nombre' => 'Punta de Mata', 'municipio_id' => 203],

            //MUN_LIBERTADOR_MO (204)
            ['nombre' => 'Chaguaramas', 'municipio_id' => 204],
            ['nombre' => 'Las Alhuacas', 'municipio_id' => 204],
            ['nombre' => 'Tabasca', 'municipio_id' => 204],
            ['nombre' => 'Temblador', 'municipio_id' => 204],

            //MUN_MATURÍN (205)
            ['nombre' => 'Alto de los Godos', 'municipio_id' => 205],
            ['nombre' => 'Boquerón', 'municipio_id' => 205],
            ['nombre' => 'Las Cocuizas', 'municipio_id' => 205],
            ['nombre' => 'La Cruz', 'municipio_id' => 205],
            ['nombre' => 'San Simón', 'municipio_id' => 205],
            ['nombre' => 'El Corozo', 'municipio_id' => 205],
            ['nombre' => 'El Furrial', 'municipio_id' => 205],
            ['nombre' => 'Jusepín', 'municipio_id' => 205],
            ['nombre' => 'La Pica', 'municipio_id' => 205],
            ['nombre' => 'San Vicente', 'municipio_id' => 205],

            //MUN_PIAR_MO (206)
            ['nombre' => 'Aparicio', 'municipio_id' => 206],
            ['nombre' => 'Aragua de Maturín', 'municipio_id' => 206],
            ['nombre' => 'El Pinto', 'municipio_id' => 206],
            ['nombre' => 'Guanaguana', 'municipio_id' => 206],
            ['nombre' => 'La Toscana', 'municipio_id' => 206],
            ['nombre' => 'Taguaya', 'municipio_id' => 206],
            ['nombre' => 'Chaguaramal', 'municipio_id' => 206],

            //MUN_PUNCERES (207)
            ['nombre' => 'Cachipo', 'municipio_id' => 207],
            ['nombre' => 'Quiriquire', 'municipio_id' => 207],

            //MUN_SANTA_BÁRBARA (208)
            ['nombre' => 'Santa Bárbara', 'municipio_id' => 208],
            ['nombre' => 'Morón', 'municipio_id' => 208],

            //MUN_SOTILLO (209)
            ['nombre' => 'Barrancas', 'municipio_id' => 209],
            ['nombre' => 'Los Barrancos de Fajardo', 'municipio_id' => 209],

            //MUN_URACOA (210)
            ['nombre' => 'Uracoa', 'municipio_id' => 210],
            
            //---Nueva Esparta---

            //MUN_ANTOLÍN_DEL_CAMPO (211)
            ['nombre' => 'Antolín del Campo', 'municipio_id' => 211],

            //MUN_ARISMENDI_NE (212)
            ['nombre' => 'Arismendi', 'municipio_id' => 212],

            //MUN_DÍAZ (213)
            ['nombre' => 'San Juan Bautista', 'municipio_id' => 213],
            ['nombre' => 'Zabala', 'municipio_id' => 213],

            //MUN_GARCÍA (214)
            ['nombre' => 'García', 'municipio_id' => 214],
            ['nombre' => 'Francisco Fajardo', 'municipio_id' => 214],
            ['nombre' => 'Cerro de Matasiete', 'municipio_id' => 214],
            ['nombre' => 'Santa Ana', 'municipio_id' => 214],
            ['nombre' => 'Sucre', 'municipio_id' => 214],

            //MUN_GÓMEZ (215)
            ['nombre' => 'Bolívar', 'municipio_id' => 215],
            ['nombre' => 'Guevara', 'municipio_id' => 215],
            ['nombre' => 'Yaguaraparo', 'municipio_id' => 215],

            //MUN_MANEIRO (216)
            ['nombre' => 'Aguirre', 'municipio_id' => 216],
            ['nombre' => 'Maneiro', 'municipio_id' => 216],

            //MUN_MARCANO (217)
            ['nombre' => 'Adrián', 'municipio_id' => 217],
            ['nombre' => 'Juan Griego', 'municipio_id' => 217],

            //MUN_MARIÑO_NE (218)
            ['nombre' => 'Mariño', 'municipio_id' => 218],

            //MUN_MACANAO (219)
            ['nombre' => 'San Francisco de Macanao', 'municipio_id' => 219],
            ['nombre' => 'Boca de Río', 'municipio_id' => 219],

            //MUN_TUBORES (220)
            ['nombre' => 'Tubores', 'municipio_id' => 220],
            ['nombre' => 'Los Barales', 'municipio_id' => 220],

            //MUN_VILLALBA (221)
            ['nombre' => 'Vicente Fuentes', 'municipio_id' => 221],
            ['nombre' => 'Villalba', 'municipio_id' => 221],
            
            //--- Portuguesa ---

            //MUN_AGUA_BLANCA (222)
            ['nombre' => 'Agua Blanca', 'municipio_id' => 222],

            //MUN_ARAURE (223)
            ['nombre' => 'Araure', 'municipio_id' => 223],
            ['nombre' => 'Río Acarigua', 'municipio_id' => 223],

            //MUN_ESTELLER (224)
            ['nombre' => 'Píritu', 'municipio_id' => 224],
            ['nombre' => 'Uveral', 'municipio_id' => 224],

            //MUN_GUANARE (225)
            ['nombre' => 'Córdoba', 'municipio_id' => 225],
            ['nombre' => 'Guanare', 'municipio_id' => 225],
            ['nombre' => 'San José de la Montaña', 'municipio_id' => 225],
            ['nombre' => 'San Juan de Guanaguanare', 'municipio_id' => 225],
            ['nombre' => 'Virgen de Coromoto', 'municipio_id' => 225],

            //MUN_GUANARITO (226)
            ['nombre' => 'Guanarito', 'municipio_id' => 226],
            ['nombre' => 'Trinidad de la Capilla', 'municipio_id' => 226],
            ['nombre' => 'Divina Pastora', 'municipio_id' => 226],

            //MUN_MONSEÑOR_JOSÉ_VICENTE_DE_UNDA (227)
            ['nombre' => 'Peña Blanca', 'municipio_id' => 227],

            //MUN_OSPINO (228)
            ['nombre' => 'Aparición', 'municipio_id' => 228],
            ['nombre' => 'La Estación', 'municipio_id' => 228],
            ['nombre' => 'Ospino', 'municipio_id' => 228],

            //MUN_PÁEZ_PO (229)
            ['nombre' => 'Acarigua', 'municipio_id' => 229],
            ['nombre' => 'Payara', 'municipio_id' => 229],
            ['nombre' => 'Pimpinela', 'municipio_id' => 229],
            ['nombre' => 'Ramón Peraza', 'municipio_id' => 229],

            //MUN_PAPELÓN (230)
            ['nombre' => 'Caño Delgadito', 'municipio_id' => 230],
            ['nombre' => 'Papelón', 'municipio_id' => 230],

            //MUN_SAN_GENARO_DE_BOCONOÍTO (231)
            ['nombre' => 'Antolín Tovar Anquino', 'municipio_id' => 231],
            ['nombre' => 'Boconoíto', 'municipio_id' => 231],

            //MUN_SAN_RAFAEL_DE_ONOTO (232)
            ['nombre' => 'Santa Fé', 'municipio_id' => 232],
            ['nombre' => 'San Rafael de Onoto', 'municipio_id' => 232],
            ['nombre' => 'Thermo Morales', 'municipio_id' => 232],

            //MUN_SANTA_ROSALÍA (233)
            ['nombre' => 'Florida', 'municipio_id' => 233],
            ['nombre' => 'Elplayón', 'municipio_id' => 233],

            //MUN_SUCRE_PO (234)
            ['nombre' => 'Biscucuy', 'municipio_id' => 234],
            ['nombre' => 'Concepción', 'municipio_id' => 234],
            ['nombre' => 'San José de Saguaz', 'municipio_id' => 234],
            ['nombre' => 'San Rafael de Palo Alzado', 'municipio_id' => 234],
            ['nombre' => 'Uvencio Antonio Velásquez', 'municipio_id' => 234],
            ['nombre' => 'Villa Rosa', 'municipio_id' => 234],

            //MUN_TURÉN (235)
            ['nombre' => 'Villa Bruzual', 'municipio_id' => 235],
            ['nombre' => 'Canelones', 'municipio_id' => 235],
            ['nombre' => 'Santa Cruz', 'municipio_id' => 235],
            ['nombre' => 'San Isidro Labrador', 'municipio_id' => 235],
            
            
            //--Sucre--

            //MUN_ANDRÉSELOY_BLANCO (236)
            ['nombre' => 'Mariño', 'municipio_id' => 236],
            ['nombre' => 'Rómulo Gallegos', 'municipio_id' => 236],

            //MUN_ANDRÉS_MATA (237)
            ['nombre' => 'San José de Aerocuar', 'municipio_id' => 237],
            ['nombre' => 'Tavera Acosta', 'municipio_id' => 237],

            //MUN_ARISMENDI (238)
            ['nombre' => 'Río Caribe', 'municipio_id' => 238],
            ['nombre' => 'Antonio José de Sucre', 'municipio_id' => 238],
            ['nombre' => 'El Morro de Puerto Santo', 'municipio_id' => 238],
            ['nombre' => 'Puerto Santo', 'municipio_id' => 238],
            ['nombre' => 'San Juan de las Galdonas', 'municipio_id' => 238],
            ['nombre' => 'Unión', 'municipio_id' => 238],

            //MUN_BENÍTEZ (239)
            ['nombre' => 'El Pilar', 'municipio_id' => 239],
            ['nombre' => 'El Rincón', 'municipio_id' => 239],
            ['nombre' => 'General Francisco Antonio Váquez', 'municipio_id' => 239],
            ['nombre' => 'Guaraúnos', 'municipio_id' => 239],
            ['nombre' => 'Tunapuicito', 'municipio_id' => 239],

            //MUN_BERMÚDEZ (240)
            ['nombre' => 'Santa Catalina', 'municipio_id' => 240],
            ['nombre' => 'Santa Rosa', 'municipio_id' => 240],
            ['nombre' => 'Santa Teresa', 'municipio_id' => 240],
            ['nombre' => 'Bolívar', 'municipio_id' => 240],
            ['nombre' => 'Maracapana', 'municipio_id' => 240],

            //MUN_BOLÍVAR_SU (241)
            ['nombre' => 'Capital Bolívar', 'municipio_id' => 241],

            //MUN_CAJIGAL (242)
            ['nombre' => 'Libertad', 'municipio_id' => 242],
            ['nombre' => 'Yaguaraparo', 'municipio_id' => 242],
            ['nombre' => 'Bideau', 'municipio_id' => 242],

            //MUN_CRUZ_SALMERÓN_ACOSTA (243)
            ['nombre' => 'Cruz Salmerón Acosta', 'municipio_id' => 243],
            ['nombre' => 'Chacopata', 'municipio_id' => 243],
            ['nombre' => 'Manicuare', 'municipio_id' => 243],

            //MUN_LIBERTADOR_SU (244)
            ['nombre' => 'Tunapuy', 'municipio_id' => 244],
            ['nombre' => 'Campo Elías', 'municipio_id' => 244],

            //MUN_MARIÑO (245)
            ['nombre' => 'Irapa', 'municipio_id' => 245],
            ['nombre' => 'Campo Claro', 'municipio_id' => 245],
            ['nombre' => 'Maraval', 'municipio_id' => 245],
            ['nombre' => 'San Antonio de Irapa', 'municipio_id' => 245],

            //MUN_MEJÍA (246)
            ['nombre' => 'Mejía', 'municipio_id' => 246],
            ['nombre' => 'San Antonio', 'municipio_id' => 246],

            //MUN_MONTES (247)
            ['nombre' => 'Cumanacoa', 'municipio_id' => 247],
            ['nombre' => 'Arenas', 'municipio_id' => 247],
            ['nombre' => 'Aricagua', 'municipio_id' => 247],
            ['nombre' => 'San Lorenzo', 'municipio_id' => 247],
            ['nombre' => 'San Fernando', 'municipio_id' => 247],
            ['nombre' => 'San Juan', 'municipio_id' => 247],

            //MUN_RIBERO (248)
            ['nombre' => 'Villa Frontado', 'municipio_id' => 248],
            ['nombre' => 'Catuaro', 'municipio_id' => 248],
            ['nombre' => 'Rendón', 'municipio_id' => 248],
            ['nombre' => 'Cariaco', 'municipio_id' => 248],

            //MUN_SUCRE_SU (249)
            ['nombre' => 'Altagracia', 'municipio_id' => 249],
            ['nombre' => 'Santa Inés', 'municipio_id' => 249],
            ['nombre' => 'Ayacucho', 'municipio_id' => 249],
            ['nombre' => 'Raúl Leoni', 'municipio_id' => 249],
            ['nombre' => 'Gran Mariscal', 'municipio_id' => 249],
            ['nombre' => 'Valentín Valiente', 'municipio_id' => 249],
            ['nombre' => 'San Cruz', 'municipio_id' => 249],
            ['nombre' => 'Santa María', 'municipio_id' => 249],

            //MUN_VALDEZ (250)
            ['nombre' => 'Cristóbal Colón', 'municipio_id' => 250],
            ['nombre' => 'Boca de Río', 'municipio_id' => 250],
            ['nombre' => 'Güiria', 'municipio_id' => 250],

            //---Tachira---

            //MUN_ANDRÉS_BELLO_TA (251)
            ['nombre' => 'Andrés Bello', 'municipio_id' => 251],

            //MUN_ANTONIO_RÓMULO_COSTA (252)
            ['nombre' => 'Antonio Rómulo Costa', 'municipio_id' => 252],

            //MUN_AYACUCHO (253)
            ['nombre' => 'Ayacucho', 'municipio_id' => 253],
            ['nombre' => 'Rivas Berti', 'municipio_id' => 253],
            ['nombre' => 'San Pedro del Río', 'municipio_id' => 253],

            //MUN_BOLÍVAR_TA (254)
            ['nombre' => 'Palotal', 'municipio_id' => 254],
            ['nombre' => 'Juan Vicente Gómez', 'municipio_id' => 254],
            ['nombre' => 'Isaías Medina Angarita', 'municipio_id' => 254],

            //MUN_CÁRDENAS (255)
            ['nombre' => 'Cárdenas', 'municipio_id' => 255],
            ['nombre' => 'La Florida', 'municipio_id' => 255],

            //MUN_CÓRDOBA (256)
            ['nombre' => 'Córdoba', 'municipio_id' => 256],
            ['nombre' => 'Amenodoro Rangel Lamus', 'municipio_id' => 256],
            ['nombre' => 'Santo Domingo', 'municipio_id' => 256],

            //MUN_FERNÁNDEZ_FEO (257)
            ['nombre' => 'Fernández Feo', 'municipio_id' => 257],
            ['nombre' => 'Alberto Adriani', 'municipio_id' => 257],
            ['nombre' => 'José Antonio Páez', 'municipio_id' => 257],

            //MUN_FRANCISCO_DE_MIRANDA (258)
            ['nombre' => 'Francisco de Miranda', 'municipio_id' => 258],
            ['nombre' => 'Boca de Grita', 'municipio_id' => 258],

            //MUN_GARCÍA_DE_HEVIA (259)
            ['nombre' => 'García de Hevia', 'municipio_id' => 259],
            ['nombre' => 'Juan Germán Roscio', 'municipio_id' => 259],
            ['nombre' => 'Quinimarí', 'municipio_id' => 259],
            ['nombre' => 'Bramón', 'municipio_id' => 259],

            //MUN_GUÁSIMOS (260)
            ['nombre' => 'Guásimos', 'municipio_id' => 260],
            ['nombre' => 'Emilio Constantino Guerrero', 'municipio_id' => 260],

            //MUN_INDEPENDENCIA_TA (261)
            ['nombre' => 'Independencia', 'municipio_id' => 261],
            ['nombre' => 'La Fría', 'municipio_id' => 261],

            //MUN_JÁUREGUI (262)
            ['nombre' => 'Jáuregui', 'municipio_id' => 262],
            ['nombre' => 'Cipriano Castro', 'municipio_id' => 262],
            ['nombre' => 'Constitución', 'municipio_id' => 262],

            //MUN_JOSÉ_MARÍA_VARGAS (263)
            ['nombre' => 'José María Vargas', 'municipio_id' => 263],
            ['nombre' => 'La Petrólea', 'municipio_id' => 263],

            //MUN_JUNÍN (264)
            ['nombre' => 'Junín', 'municipio_id' => 264],
            ['nombre' => 'Rubio', 'municipio_id' => 264],
            ['nombre' => 'San Antonio del Táchira', 'municipio_id' => 264],

            //MUN_LIBERTAD (265)
            ['nombre' => 'Libertad', 'municipio_id' => 265],
            ['nombre' => 'Doradas', 'municipio_id' => 265],

            //MUN_LIBERTADOR_TA (266)
            ['nombre' => 'Libertador', 'municipio_id' => 266],
            ['nombre' => 'Constitución', 'municipio_id' => 266],

            //MUN_LOBATERA (267)
            ['nombre' => 'Lobatera', 'municipio_id' => 267],
            ['nombre' => 'La Palmitas', 'municipio_id' => 267],

            //MUN_MICHELENA (268)
            ['nombre' => 'Michelena', 'municipio_id' => 268],
            ['nombre' => 'Nueva Arcadia', 'municipio_id' => 268],

            //MUN_PANAMERICANO (269)
            ['nombre' => 'Panamericano', 'municipio_id' => 269],
            ['nombre' => 'Pecaya', 'municipio_id' => 269],
            ['nombre' => 'San Joaquín de Navay', 'municipio_id' => 269],

            //MUN_PEDRO_MARÍA_UREÑA (270)
            ['nombre' => 'Pedro María Ureña', 'municipio_id' => 270],
            ['nombre' => 'Boconó', 'municipio_id' => 270],

            //MUN_RAFAEL_URDANETA (271)
            ['nombre' => 'Delicias', 'municipio_id' => 271],
            ['nombre' => 'San Sebastián', 'municipio_id' => 271],

            //MUN_SAMUEL_DARÍO_MALDONADO (272)
            ['nombre' => 'Samuel Darío Maldonado', 'municipio_id' => 272],
            ['nombre' => 'La Concordia', 'municipio_id' => 272],

            //MUN_SAN_CRISTÓBAL (273)
            ['nombre' => 'San Cristóbal', 'municipio_id' => 273],
            ['nombre' => 'San Juan Bautista', 'municipio_id' => 273],
            ['nombre' => 'Pedro María Morantes', 'municipio_id' => 273],
            ['nombre' => 'San Pablo', 'municipio_id' => 273],
            ['nombre' => 'La Concordia', 'municipio_id' => 273],

            //MUN_SEBORUCO (274)
            ['nombre' => 'Seboruco', 'municipio_id' => 274],

            //MUN_SIMÓN_RODRÍGUEZ (275)
            ['nombre' => 'Simón Rodríguez', 'municipio_id' => 275],

            //MUN_SUCRE_TA (276)
            ['nombre' => 'Sucre', 'municipio_id' => 276],
            ['nombre' => 'Eleazar López Contreras', 'municipio_id' => 276],

            //MUN_TORBES (277)
            ['nombre' => 'San José Obrero', 'municipio_id' => 277],

            //MUN_URIBANTE (278)
            ['nombre' => 'Uribante', 'municipio_id' => 278],
            ['nombre' => 'Potosí', 'municipio_id' => 278],

            //MUN_SAN_JUDAS_TADEO (279)
            ['nombre' => 'San Judas Tadeo', 'municipio_id' => 279],
            ['nombre' => 'Dr. Francisco Romero Lobo', 'municipio_id' => 279],
            
            
            //---Trujillo---


            //MUN_ANDRÉS_BELLO (280)
            ['nombre' => 'Araguaney', 'municipio_id' => 280],
            ['nombre' => 'El Jagüito', 'municipio_id' => 280],
            ['nombre' => 'La Esperanza', 'municipio_id' => 280],
            ['nombre' => 'Santa Isabel', 'municipio_id' => 280],

            //MUN_BOCONÓ (281)
            ['nombre' => 'Boconó', 'municipio_id' => 281],
            ['nombre' => 'El Carmen', 'municipio_id' => 281],
            ['nombre' => 'Mosquey', 'municipio_id' => 281],
            ['nombre' => 'Ayacucho', 'municipio_id' => 281],
            ['nombre' => 'Burbusay', 'municipio_id' => 281],
            ['nombre' => 'General Ribas', 'municipio_id' => 281],
            ['nombre' => 'Guaramacal', 'municipio_id' => 281],
            ['nombre' => 'Vega de Guaramacal', 'municipio_id' => 281],
            ['nombre' => 'Monseñor Jáuregui', 'municipio_id' => 281],
            ['nombre' => 'Rafael Rangel', 'municipio_id' => 281],
            ['nombre' => 'San Miguel', 'municipio_id' => 281],
            ['nombre' => 'San José T', 'municipio_id' => 281],

            //MUN_BOLÍVAR_TU (282)
            ['nombre' => 'Sabana Grande', 'municipio_id' => 282],
            ['nombre' => 'Cheregüé', 'municipio_id' => 282],
            ['nombre' => 'Granados', 'municipio_id' => 282],

            //MUN_CANDELARIA (283)
            ['nombre' => 'Arnoldo Gabaldón', 'municipio_id' => 283],
            ['nombre' => 'Bolivia', 'municipio_id' => 283],
            ['nombre' => 'Carrillo', 'municipio_id' => 283],
            ['nombre' => 'Cegarra', 'municipio_id' => 283],
            ['nombre' => 'Chejendé', 'municipio_id' => 283],
            ['nombre' => 'Manuel Salvador Ulloa', 'municipio_id' => 283],
            ['nombre' => 'San José ', 'municipio_id' => 283],

            //MUN_CARACHE (284)
            ['nombre' => 'Carache', 'municipio_id' => 284],
            ['nombre' => 'La Concepción ', 'municipio_id' => 284],
            ['nombre' => '_Cuicas', 'municipio_id' => 284],
            ['nombre' => 'Panamericana', 'municipio_id' => 284],
            ['nombre' => 'Santa Cruz', 'municipio_id' => 284],

            //MUN_ESCUQUE (285)
            ['nombre' => 'Escuque', 'municipio_id' => 285],
            ['nombre' => 'La Unión El Alto Escuque', 'municipio_id' => 285],
            ['nombre' => 'Santa Rita ', 'municipio_id' => 285],
            ['nombre' => 'Sabana Libre', 'municipio_id' => 285],

            //MUN_JOSÉ_FELIPE_MÁRQUEZ_CAÑIZALEZ (286)
            ['nombre' => 'El Socorro', 'municipio_id' => 286],
            ['nombre' => 'Los Caprichos', 'municipio_id' => 286],
            ['nombre' => 'Antonio José de Sucre', 'municipio_id' => 286],

            //MUN_JUAN_VICENTE_CAMPOSELÍAS (287)
            ['nombre' => 'Campoelías ', 'municipio_id' => 287],
            ['nombre' => 'Arnoldo Gabaldón', 'municipio_id' => 287],

            //MUN_LA_CEIBA (288)
            ['nombre' => 'Santa Apolonia', 'municipio_id' => 288],
            ['nombre' => 'Elprogreso', 'municipio_id' => 288],
            ['nombre' => 'La Ceiba', 'municipio_id' => 288],
            ['nombre' => 'Tres de Febrero', 'municipio_id' => 288],

            //MUN_MIRANDA_TU (289)
            ['nombre' => 'El Dividive', 'municipio_id' => 289],
            ['nombre' => 'Agua Santa', 'municipio_id' => 289],
            ['nombre' => 'Agua Caliente', 'municipio_id' => 289],
            ['nombre' => 'El Cenizo', 'municipio_id' => 289],
            ['nombre' => 'Valerita', 'municipio_id' => 289],

            //MUN_MONTE_CARMELO (290)
            ['nombre' => 'Monte Carmelo', 'municipio_id' => 290],
            ['nombre' => 'Buena Vista', 'municipio_id' => 290],
            ['nombre' => 'Santa María del Horcón', 'municipio_id' => 290],

            //MUN_MOTATÁN (291)
            ['nombre' => 'Motatán', 'municipio_id' => 291],
            ['nombre' => 'El Baño', 'municipio_id' => 291],
            ['nombre' => 'Jalisco', 'municipio_id' => 291],

            //MUN_PAMPÁN (292)
            ['nombre' => 'Pampán', 'municipio_id' => 292],
            ['nombre' => 'Flor Depatria', 'municipio_id' => 292],
            ['nombre' => 'Lapaz', 'municipio_id' => 292],
            ['nombre' => 'Santa Ana', 'municipio_id' => 292],

            //MUN_PAMPANITO (293)
            ['nombre' => 'Pampanito', 'municipio_id' => 293],
            ['nombre' => 'La Concepción', 'municipio_id' => 293],
            ['nombre' => 'Pampanito II', 'municipio_id' => 293],

            //MUN_RAFAEL_RANGEL (294)
            ['nombre' => 'Betijoque', 'municipio_id' => 294],
            ['nombre' => 'José Gregorio Hernández', 'municipio_id' => 294],
            ['nombre' => 'Lapueblita', 'municipio_id' => 294],
            ['nombre' => 'Los Cedros', 'municipio_id' => 294],

            //MUN_SAN_RAFAEL_DE_CARVAJAL (295)
            ['nombre' => 'Carvajal', 'municipio_id' => 295],
            ['nombre' => 'Campo Alegre', 'municipio_id' => 295],
            ['nombre' => 'Antonio Nicolás Briceño', 'municipio_id' => 295],
            ['nombre' => 'José Leonardo Suárez', 'municipio_id' => 295],

            //MUN_SUCRE_TU (296)
            ['nombre' => 'Sabana de Mendoza', 'municipio_id' => 296],
            ['nombre' => 'Junín', 'municipio_id' => 296],
            ['nombre' => 'Valmore Rodríguez', 'municipio_id' => 296],
            ['nombre' => 'Elparaíso', 'municipio_id' => 296],

            //MUN_TRUJILLO (297)
            ['nombre' => 'Andrés Linares', 'municipio_id' => 297],
            ['nombre' => 'Chiquinquirá', 'municipio_id' => 297],
            ['nombre' => 'Cristóbal Mendoza', 'municipio_id' => 297],
            ['nombre' => 'Cruz Carrillo', 'municipio_id' => 297],
            ['nombre' => 'Matriz', 'municipio_id' => 297],
            ['nombre' => 'Monseñor Carrillo', 'municipio_id' => 297],
            ['nombre' => 'Tres Esquinas', 'municipio_id' => 297],

            //MUN_URDANETA (298)
            ['nombre' => 'Cabimbú', 'municipio_id' => 298],
            ['nombre' => 'Jajó', 'municipio_id' => 298],
            ['nombre' => 'La Mesa de Esnujaque', 'municipio_id' => 298],
            ['nombre' => 'Tuñame', 'municipio_id' => 298],
            ['nombre' => 'La Quebrada', 'municipio_id' => 298],

            //MUN_VALERA (299)
            ['nombre' => 'Juan Ignacio Montilla', 'municipio_id' => 299],
            ['nombre' => 'La Beatriz', 'municipio_id' => 299],
            ['nombre' => 'Lapuerta', 'municipio_id' => 299],
            ['nombre' => 'Mendoza del Valle de Momboy', 'municipio_id' => 299],
            ['nombre' => 'Mercedes Díaz', 'municipio_id' => 299],
            ['nombre' => 'San Luis', 'municipio_id' => 299],
            
            
            //---Yaracuy---

            
            //MUN_ARÍSTIDES_BASTIDAS (300)
            ['nombre' => 'Arístides Bastidas', 'municipio_id' => 300],

            //MUN_BOLÍVAR (301)
            ['nombre' => 'Bolívar', 'municipio_id' => 301],

            //MUN_BRUZUAL (302)
            ['nombre' => 'Chivacoa', 'municipio_id' => 302],
            ['nombre' => 'Campo Elías', 'municipio_id' => 302],

            //MUN_COCOROTE (303)
            ['nombre' => 'Cocorote', 'municipio_id' => 303],

            //MUN_INDEPENDENCIA (304)
            ['nombre' => 'Independencia YA', 'municipio_id' => 304],

            //MUN_JOSÉ_ANTONIOPÁEZ (305)
            ['nombre' => 'José Antonio Páez', 'municipio_id' => 305],

            //MUN_LA_TRINIDAD (306)
            ['nombre' => 'La Trinidad', 'municipio_id' => 306],

            //MUN_MANUEL_MONGE (307)
            ['nombre' => 'Manuel Monge', 'municipio_id' => 307],
            ['nombre' => 'Temerla', 'municipio_id' => 307],

            //MUN_NIRGUA (308)
            ['nombre' => 'Salóm', 'municipio_id' => 308],
            ['nombre' => 'Nirgua', 'municipio_id' => 308],
            ['nombre' => 'San Antonio', 'municipio_id' => 308],

            //MUN_PEÑA (309)
            ['nombre' => 'San Andrés', 'municipio_id' => 309],
            ['nombre' => 'Yaritagua', 'municipio_id' => 309],

            //MUN_SAN_FELIPE (310)
            ['nombre' => 'Albarico', 'municipio_id' => 310],
            ['nombre' => 'San Javier', 'municipio_id' => 310],
            ['nombre' => 'San Felipe', 'municipio_id' => 310],

            //MUN_SUCRE_YA (311)
            ['nombre' => 'Sucre YA', 'municipio_id' => 311],

            //MUN_URACHICHE (312)
            ['nombre' => 'Urachiche', 'municipio_id' => 312],
            ['nombre' => 'Farriar', 'municipio_id' => 312],

            //MUN_JOSÉ_JOAQUÍN_VEROES (313)
            ['nombre' => 'El Guayabo', 'municipio_id' => 313],


            //---Zulia ---


            //MUN_ALMIRANTEPADILLA (314)
            ['nombre' => 'Isla de Toas', 'municipio_id' => 314],

            //MUN_BARALT (315)
            ['nombre' => 'San Timoteo', 'municipio_id' => 315],
            ['nombre' => 'General Urdaneta', 'municipio_id' => 315],
            ['nombre' => 'Libertador', 'municipio_id' => 315],
            ['nombre' => 'Marcelino Briceño', 'municipio_id' => 315],
            ['nombre' => 'Pueblo Nuevo ', 'municipio_id' => 315],
            ['nombre' => 'Manuel Guanipa Matos', 'municipio_id' => 315],

            //MUN_CABIMAS (316)
            ['nombre' => 'Ambrosio', 'municipio_id' => 316],
            ['nombre' => 'Carmen Herrera', 'municipio_id' => 316],
            ['nombre' => 'La Rosa', 'municipio_id' => 316],
            ['nombre' => 'Germán Ríos Linares', 'municipio_id' => 316],
            ['nombre' => 'San Benito', 'municipio_id' => 316],
            ['nombre' => 'Rómulo Betancourt', 'municipio_id' => 316],
            ['nombre' => 'Jorge Hernández', 'municipio_id' => 316],
            ['nombre' => 'Punta Gorda', 'municipio_id' => 316],
            ['nombre' => 'Arístides Calvani', 'municipio_id' => 316],

            //MUN_CATATUMBO (317)
            ['nombre' => 'Encontrados', 'municipio_id' => 317],
            ['nombre' => 'Udón Pérez', 'municipio_id' => 317],

            //MUN_COLÓN (318)
            ['nombre' => 'Moralito', 'municipio_id' => 318],
            ['nombre' => 'San Carlos del Zulia', 'municipio_id' => 318],
            ['nombre' => 'Santa Cruz del Zulia', 'municipio_id' => 318],
            ['nombre' => 'Santa Bárbara', 'municipio_id' => 318],
            ['nombre' => 'San José de Perijá', 'municipio_id' => 318],
            ['nombre' => 'Urribarrí', 'municipio_id' => 318],

            //MUN_FRANCISCO_JAVIER_PULGAR (319)
            ['nombre' => 'Carlos Quevedo', 'municipio_id' => 319],
            ['nombre' => 'Francisco Javier Pulgar', 'municipio_id' => 319],
            ['nombre' => 'Simón Rodríguez', 'municipio_id' => 319],
            ['nombre' => 'Guamo-Gavilanes', 'municipio_id' => 319],

            //MUN_JESÚS_ENRIQUE_LOSSADA (320)
            ['nombre' => 'La Concepción ', 'municipio_id' => 320],
            ['nombre' => 'San José ', 'municipio_id' => 320],
            ['nombre' => 'Marianoparra León', 'municipio_id' => 320],

            //MUN_JESÚS_MARÍA_SEMPRÚN (321)
            ['nombre' => 'Jesús María Semprún', 'municipio_id' => 321],
            ['nombre' => 'Barí', 'municipio_id' => 321],
            ['nombre' => 'José Ramón Yépez', 'municipio_id' => 321],

            //MUN_LA_CAÑADA_DE_URDANETA (322)
            ['nombre' => 'Concepción ', 'municipio_id' => 322],
            ['nombre' => 'Andrés Bello ', 'municipio_id' => 322],
            ['nombre' => 'Chiquinquirá ', 'municipio_id' => 322],
            ['nombre' => 'El Carmelo', 'municipio_id' => 322],
            ['nombre' => 'Potreritos', 'municipio_id' => 322],

            //MUN_LAGUNILLAS (323)
            ['nombre' => 'Libertad ', 'municipio_id' => 323],
            ['nombre' => 'Alonso de Ojeda', 'municipio_id' => 323],
            ['nombre' => 'Venezuela', 'municipio_id' => 323],
            ['nombre' => 'Eleazar López Contreras', 'municipio_id' => 323],
            ['nombre' => 'Campo Lara', 'municipio_id' => 323],

            //MUN_MACHIQUES_DEPERIJÁ (324)
            ['nombre' => 'Bartolomé de las Casas', 'municipio_id' => 324],
            ['nombre' => 'Libertad Z', 'municipio_id' => 324],
            ['nombre' => 'Río Negro', 'municipio_id' => 324],
            ['nombre' => 'San José de Perijá', 'municipio_id' => 324],

            //MUN_MARA (325)
            ['nombre' => 'San Rafael ', 'municipio_id' => 325],
            ['nombre' => 'Las Parcelas', 'municipio_id' => 325],
            ['nombre' => 'Luis de Vicente', 'municipio_id' => 325],
            ['nombre' => 'Monseñor Marcos Sergio Godoy', 'municipio_id' => 325],
            ['nombre' => 'Ricaurte', 'municipio_id' => 325],

            //MUN_MARACAIBO (326)
            ['nombre' => 'Antonio Borjas Romero', 'municipio_id' => 326],
            ['nombre' => 'Bolívar ', 'municipio_id' => 326],
            ['nombre' => 'Cacique Mara', 'municipio_id' => 326],
            ['nombre' => 'Carracciolo Parra Pérez', 'municipio_id' => 326],
            ['nombre' => 'Cecilio Acosta', 'municipio_id' => 326],
            ['nombre' => 'Cristo de Aranza', 'municipio_id' => 326],
            ['nombre' => 'Coquivacoa', 'municipio_id' => 326],
            ['nombre' => 'Chiquinquirá', 'municipio_id' => 326],
            ['nombre' => 'Francisco Eugenio Bustamante', 'municipio_id' => 326],
            ['nombre' => 'Idelfonzo Vásquez', 'municipio_id' => 326],
            ['nombre' => 'Juana de Ávila', 'municipio_id' => 326],
            ['nombre' => 'Luis Hurtado Higuera', 'municipio_id' => 326],
            ['nombre' => 'Manuel Dagnino', 'municipio_id' => 326],
            ['nombre' => 'Olegario Villalobos', 'municipio_id' => 326],
            ['nombre' => 'Raúl Leoni', 'municipio_id' => 326],
            ['nombre' => 'Santa Lucía', 'municipio_id' => 326],
            ['nombre' => 'Venancio Pulgar', 'municipio_id' => 326],
            ['nombre' => 'San Isidro', 'municipio_id' => 326],

            //MUN_MIRANDA_ZU (327)
            ['nombre' => 'Altagracia', 'municipio_id' => 327],
            ['nombre' => 'Elías Sánchez Rubio', 'municipio_id' => 327],

            //MUN_PÁEZ_ZU (328)
            ['nombre' => 'Sinamaica', 'municipio_id' => 328],
            ['nombre' => 'Alta Guajira', 'municipio_id' => 328],
            ['nombre' => 'Guajira', 'municipio_id' => 328],

            //MUN_ROSARIO_DEPERIJÁ (329)
            ['nombre' => 'Donaldo García', 'municipio_id' => 329],
            ['nombre' => 'El Rosario', 'municipio_id' => 329],
            ['nombre' => 'Sixto Zambrano', 'municipio_id' => 329],

            //MUN_SAN_FRANCISCO_ZU (330)
            ['nombre' => 'San Francisco', 'municipio_id' => 330],
            ['nombre' => 'Domitila Flores', 'municipio_id' => 330],
            ['nombre' => 'Francisco Ochoa', 'municipio_id' => 330],
            ['nombre' => 'Los Cortijos', 'municipio_id' => 330],
            ['nombre' => 'Marcial Hernández', 'municipio_id' => 330],
            ['nombre' => 'José Domingo Rus', 'municipio_id' => 330],

            //MUN_SANTA_RITA (331)
            ['nombre' => 'Santa Rita', 'municipio_id' => 331],
            ['nombre' => 'El Mene', 'municipio_id' => 331],
            ['nombre' => 'Pedro Lucas Urribarrí', 'municipio_id' => 331],

            //MUN_SIMÓN_BOLÍVAR (332)
            ['nombre' => 'Rafael María Baralt', 'municipio_id' => 332],
            ['nombre' => 'Manuel Manrique', 'municipio_id' => 332],
            ['nombre' => 'Rafael Urdaneta ', 'municipio_id' => 332],

            //MUN_SUCRE_ZU (333)
            ['nombre' => 'Bobures', 'municipio_id' => 333],
            ['nombre' => 'Gibraltar', 'municipio_id' => 333],
            ['nombre' => 'Heras', 'municipio_id' => 333],
            ['nombre' => 'Monseñor Arturo Álvarez', 'municipio_id' => 333],
            ['nombre' => 'El Batey', 'municipio_id' => 333],

            //MUN_VALMORE_RODRÍGUEZ (334)
            ['nombre' => 'Rafael Urdaneta', 'municipio_id' => 334],
            ['nombre' => 'La Victoria', 'municipio_id' => 334],
            ['nombre' => 'Raúl Cuenca', 'municipio_id' => 334],
        
            
        ];

        DB::table('parroquias')->insert($parroquias);
    }
}
