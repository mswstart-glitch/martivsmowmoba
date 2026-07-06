<?php

namespace Database\Seeders;

use App\Models\DrivingAnswerTranslation;
use App\Models\DrivingQuestionTranslation;
use Illuminate\Database\Seeder;

class DrivingQuestionTranslationSeeder extends Seeder
{
    /**
     * Seeds en/ru/tr/az translations for the 5 demo driving questions
     * (and their answers) used by the Laravel /exam page. Georgian stays
     * on the base driving_questions/driving_answers tables as the default.
     */
    public function run(): void
    {
        $questions = [
            1 => [
                'en' => [
                    'question' => 'Which vehicle\'s driver is obligated to yield the right of way when driving in the direction of the arrow?',
                    'explanation' => 'According to sub-paragraph "g" of paragraph 4 of Article 36 of the Georgian Law "On Road Traffic", at an intersection of equal-priority roads, the driver of a non-railed vehicle must yield the right of way to a vehicle approaching from the right. The same rule applies between drivers of railed vehicles. At such an intersection, a railed vehicle has priority over a non-railed vehicle, regardless of its direction of travel.',
                ],
                'ru' => [
                    'question' => 'Водитель какого автомобиля обязан уступить дорогу при движении в направлении стрелки?',
                    'explanation' => 'Согласно подпункту «г» пункта 4 статьи 36 Закона Грузии «О дорожном движении», на пересечении равнозначных дорог водитель безрельсового транспортного средства обязан уступить дорогу транспортному средству, приближающемуся справа. Этим же правилом должны руководствоваться между собой и водители рельсовых транспортных средств. На таком перекрёстке рельсовое транспортное средство имеет преимущество перед безрельсовым, независимо от направления его движения.',
                ],
                'tr' => [
                    'question' => 'Ok yönünde hareket edilmesi durumunda hangi aracın sürücüsü yol verme yükümlülüğü altındadır?',
                    'explanation' => 'Gürcistan\'ın "Karayolu Trafiği Hakkında" Kanunu\'nun 36. maddesinin 4. fıkrasının "g" bendine göre, eşdeğer yolların kesiştiği kavşakta, raysız taşıt sürücüsü sağdan yaklaşan taşıta yol vermekle yükümlüdür. Aynı kural raylı taşıt sürücüleri arasında da geçerlidir. Böyle bir kavşakta raylı taşıt, hareket yönü ne olursa olsun, raysız taşıta göre önceliğe sahiptir.',
                ],
                'az' => [
                    'question' => 'Ox istiqamətində hərəkət zamanı hansı avtomobilin sürücüsü yol vermə öhdəliyi daşıyır?',
                    'explanation' => 'Gürcüstanın "Yol hərəkəti haqqında" Qanununun 36-cı maddəsinin 4-cü bəndinin "q" yarımbəndinə əsasən, bərabərəhəmiyyətli yolların kəsişməsində relssiz nəqliyyat vasitəsinin sürücüsü sağdan yaxınlaşan nəqliyyat vasitəsinə yol verməlidir. Eyni qayda relsli nəqliyyat vasitələrinin sürücüləri arasında da tətbiq olunur. Belə bir kəsişmədə relsli nəqliyyat vasitəsi, hərəkət istiqamətindən asılı olmayaraq, relssiz nəqliyyat vasitəsi qarşısında üstünlüyə malikdir.',
                ],
                'answers' => [
                    1 => [
                        'en' => 'The truck driver',
                        'ru' => 'Водитель грузового автомобиля',
                        'tr' => 'Kamyon sürücüsü',
                        'az' => 'Yük maşınının sürücüsü',
                    ],
                    2 => [
                        'en' => 'The car driver',
                        'ru' => 'Водитель легкового автомобиля',
                        'tr' => 'Otomobil sürücüsü',
                        'az' => 'Minik avtomobilinin sürücüsü',
                    ],
                ],
            ],
            2 => [
                'en' => [
                    'question' => 'Is the driver of the red car obligated to yield to pedestrians when exiting onto the road from adjacent territory?',
                    'explanation' => 'According to paragraph 7 of Article 25 of the Georgian Law "On Road Traffic", when exiting onto a road from adjacent territory, or entering such territory from a road, the driver must yield the right of way to pedestrians.',
                ],
                'ru' => [
                    'question' => 'Обязан ли водитель красного автомобиля уступить дорогу пешеходам при выезде на дорогу с прилегающей территории?',
                    'explanation' => 'Согласно пункту 7 статьи 25 Закона Грузии «О дорожном движении», при выезде на дорогу с прилегающей территории или при въезде с дороги на такую территорию водитель обязан уступить дорогу пешеходам.',
                ],
                'tr' => [
                    'question' => 'Kırmızı otomobilin sürücüsü, bitişik alandan yola çıkarken yayalara yol vermekle yükümlü müdür?',
                    'explanation' => 'Gürcistan\'ın "Karayolu Trafiği Hakkında" Kanunu\'nun 25. maddesinin 7. fıkrasına göre, sürücü, bitişik alandan yola çıkarken veya yoldan böyle bir alana girerken yayalara yol vermelidir.',
                ],
                'az' => [
                    'question' => 'Qırmızı avtomobilin sürücüsü bitişik ərazidən yola çıxarkən piyadalara yol vermə öhdəliyi daşıyırmı?',
                    'explanation' => 'Gürcüstanın "Yol hərəkəti haqqında" Qanununun 25-ci maddəsinin 7-ci bəndinə əsasən, sürücü bitişik ərazidən yola çıxarkən və ya yoldan belə əraziyə daxil olarkən piyadalara yol verməlidir.',
                ],
                'answers' => [
                    3 => [
                        'en' => 'Yes, obligated',
                        'ru' => 'Обязан',
                        'tr' => 'Yükümlüdür',
                        'az' => 'Öhdəliyi var',
                    ],
                    4 => [
                        'en' => 'No, not obligated',
                        'ru' => 'Не обязан',
                        'tr' => 'Yükümlü değildir',
                        'az' => 'Öhdəliyi yoxdur',
                    ],
                ],
            ],
            3 => [
                'en' => [
                    'question' => 'Which vehicle\'s driver may continue moving in the direction of the arrow at this traffic light signal?',
                    'explanation' => 'According to sub-paragraphs "a" and "e" of paragraph 2 of Article 29 of the Georgian Law "On Road Traffic", the colored traffic light signals have the following meanings: a) a red light signal or a flashing red light signal prohibits movement; e) a green light signal permits movement.',
                ],
                'ru' => [
                    'question' => 'Водитель какого транспортного средства может продолжить движение в направлении стрелки при этом сигнале светофора?',
                    'explanation' => 'Согласно подпунктам «а» и «е» пункта 2 статьи 29 Закона Грузии «О дорожном движении», цветные сигналы светофора имеют следующее значение: а) красный сигнал или мигающий красный сигнал запрещает движение; е) зелёный сигнал разрешает движение.',
                ],
                'tr' => [
                    'question' => 'Bu trafik ışığı sinyalinde hangi aracın sürücüsü ok yönündeki hareketine devam edebilir?',
                    'explanation' => 'Gürcistan\'ın "Karayolu Trafiği Hakkında" Kanunu\'nun 29. maddesinin 2. fıkrasının "a" ve "e" bentlerine göre, trafik ışığı renkli sinyalleri şu anlama gelir: a) kırmızı ışık sinyali veya yanıp sönen kırmızı ışık sinyali hareketi yasaklar; e) yeşil ışık sinyali harekete izin verir.',
                ],
                'az' => [
                    'question' => 'Bu işıqfor siqnalında hansı nəqliyyat vasitəsinin sürücüsü ox istiqamətində hərəkətini davam etdirə bilər?',
                    'explanation' => 'Gürcüstanın "Yol hərəkəti haqqında" Qanununun 29-cu maddəsinin 2-ci bəndinin "a" və "e" yarımbəndlərinə əsasən, işıqforun rəngli işıq siqnalları aşağıdakı mənanı daşıyır: a) qırmızı işıq siqnalı və ya yanıb-sönən qırmızı işıq siqnalı hərəkəti qadağan edir; e) yaşıl işıq siqnalı hərəkətə icazə verir.',
                ],
                'answers' => [
                    5 => [
                        'en' => 'The car driver',
                        'ru' => 'Водитель легкового автомобиля',
                        'tr' => 'Otomobil sürücüsü',
                        'az' => 'Minik avtomobilinin sürücüsü',
                    ],
                    6 => [
                        'en' => 'The motorcyclist',
                        'ru' => 'Водитель мотоцикла',
                        'tr' => 'Motosiklet sürücüsü',
                        'az' => 'Motosiklet sürücüsü',
                    ],
                ],
            ],
            4 => [
                'en' => [
                    'question' => 'Which vehicle\'s driver is given priority when driving in the direction of the arrow?',
                    'explanation' => 'According to sub-paragraph "a" of paragraph 3 of Article 36 of the Georgian Law "On Road Traffic", at a signal-controlled intersection, when turning left or making a U-turn on a green traffic light signal, the driver of a non-railed vehicle must yield the right of way to a vehicle approaching from the opposite direction travelling straight ahead or turning right. According to paragraph 3 of Article 28 of the same Law, the requirements of traffic light signals take precedence over the requirements of priority road signs and road markings.',
                ],
                'ru' => [
                    'question' => 'Водителю какого автомобиля предоставляется преимущество при движении в направлении стрелки?',
                    'explanation' => 'Согласно подпункту «а» пункта 3 статьи 36 Закона Грузии «О дорожном движении», на регулируемом перекрёстке при повороте налево или развороте на зелёный сигнал светофора водитель безрельсового транспортного средства обязан уступить дорогу транспортному средству, движущемуся со встречного направления прямо или направо. Согласно пункту 3 статьи 28 этого же Закона, требования сигналов светофора имеют приоритет над требованиями дорожных знаков приоритета и дорожной разметки.',
                ],
                'tr' => [
                    'question' => 'Ok yönünde hareket edilmesi durumunda hangi aracın sürücüsüne öncelik tanınır?',
                    'explanation' => 'Gürcistan\'ın "Karayolu Trafiği Hakkında" Kanunu\'nun 36. maddesinin 3. fıkrasının "a" bendine göre, sinyalize bir kavşakta, yeşil ışık yanarken sola dönüş veya U dönüşü yapılırken, raysız taşıt sürücüsü karşı yönden düz ilerleyen veya sağa dönen taşıta yol vermekle yükümlüdür. Aynı Kanunun 28. maddesinin 3. fıkrasına göre, trafik ışığı sinyallerinin gereklilikleri, öncelik levhalarının ve yol işaretlemelerinin gerekliliklerinden üstündür.',
                ],
                'az' => [
                    'question' => 'Ox istiqamətində hərəkət zamanı hansı avtomobilin sürücüsünə üstünlük verilir?',
                    'explanation' => 'Gürcüstanın "Yol hərəkəti haqqında" Qanununun 36-cı maddəsinin 3-cü bəndinin "a" yarımbəndinə əsasən, tənzimlənən kəsişmədə, yaşıl işıq siqnalı yanarkən sola dönərkən və ya geri dönərkən, relssiz nəqliyyat vasitəsinin sürücüsü əks istiqamətdən düz irəliləyən və ya sağa dönən nəqliyyat vasitəsinə yol verməlidir. Eyni Qanunun 28-ci maddəsinin 3-cü bəndinə əsasən, işıqfor siqnallarının tələbləri üstünlük yol nişanlarının və yol nişanlanmasının tələblərindən üstündür.',
                ],
                'answers' => [
                    7 => [
                        'en' => 'The blue car driver',
                        'ru' => 'Водитель синего автомобиля',
                        'tr' => 'Mavi otomobilin sürücüsü',
                        'az' => 'Göy rəngli avtomobilin sürücüsü',
                    ],
                    8 => [
                        'en' => 'The white car driver',
                        'ru' => 'Водитель белого автомобиля',
                        'tr' => 'Beyaz otomobilin sürücüsü',
                        'az' => 'Ağ rəngli avtomobilin sürücüsü',
                    ],
                ],
            ],
            5 => [
                'en' => [
                    'question' => 'In what order should the vehicles moving in the direction of the arrow pass through the intersection, if the ambulance has its blue flashing special light and audible signal turned on?',
                    'explanation' => 'According to sub-paragraph "a" of paragraph 4 of Article 36 of the Georgian Law "On Road Traffic", at an uncontrolled intersection of unequal-priority roads, the driver of a vehicle travelling on the minor road must yield the right of way to a vehicle approaching from the major road, regardless of its subsequent direction of travel. According to paragraphs 1 and 2 of Article 51 of the same Law: 1. The driver of an operational or special service vehicle, who has activated the vehicle\'s blue flashing special light and is performing an official duty, may, while ensuring road traffic safety, deviate from the requirements established by Articles 25, 31-41 and 44 of this Law, as well as by Annexes N01 and N02 of this Law. In addition to the blue flashing special light, a red flashing light may also be activated. To gain priority over other road users, the driver of this vehicle must activate the blue flashing special light and the audible signal. Priority may be used only once the driver has confirmed that the right of way is being yielded to them. 2. Road users are obliged, when an operational or special service vehicle approaches with its blue flashing special light and audible signal activated, and/or which gives a signal via a loudspeaker device, to clear the roadway for it as well as for any vehicle it is escorting that has its low-beam headlights on, and to stop if necessary.',
                ],
                'ru' => [
                    'question' => 'В каком порядке должны проехать перекрёсток автомобили, движущиеся в направлении стрелки, если у автомобиля скорой медицинской помощи включены синий проблесковый маячок и звуковой сигнал?',
                    'explanation' => 'Согласно подпункту «а» пункта 4 статьи 36 Закона Грузии «О дорожном движении», на нерегулируемом перекрёстке неравнозначных дорог водитель транспортного средства, движущегося по второстепенной дороге, обязан уступить дорогу транспортному средству, приближающемуся с главной дороги, независимо от направления его дальнейшего движения. Согласно пунктам 1 и 2 статьи 51 этого же Закона: 1. Водитель оперативного или специального транспортного средства, у которого включён синий проблесковый маячок и который выполняет служебное задание, может, соблюдая условия обеспечения безопасности дорожного движения, отступать от требований статей 25, 31-41 и 44 настоящего Закона, а также от требований, установленных приложениями №01 и №02 к настоящему Закону. Наряду с синим проблесковым маячком дополнительно может быть включён красный проблесковый маячок. Для получения преимущества перед другими участниками дорожного движения водитель этого транспортного средства должен включить синий проблесковый маячок и звуковой сигнал. Пользоваться приоритетом можно только после того, как водитель убедится, что ему уступают дорогу. 2. Участники дорожного движения обязаны при приближении оперативного или специального транспортного средства с включённым синим проблесковым маячком и звуковым сигналом и/или подающего сигнал через громкоговоритель, освободить проезжую часть для него, а также для сопровождаемого им транспортного средства с включённым ближним светом фар, а при необходимости - остановиться.',
                ],
                'tr' => [
                    'question' => 'Ambulansın mavi özel flaşörü ve sesli sinyali açıkken, ok yönünde hareket eden araçlar kavşaktan hangi sırayla geçmelidir?',
                    'explanation' => 'Gürcistan\'ın "Karayolu Trafiği Hakkında" Kanunu\'nun 36. maddesinin 4. fıkrasının "a" bendine göre, kontrolsüz bir kavşakta, eşdeğer olmayan yolların kesişiminde, tali yolda ilerleyen aracın sürücüsü, sonraki hareket yönü ne olursa olsun, ana yoldan yaklaşan araca yol vermekle yükümlüdür. Aynı Kanunun 51. maddesinin 1. ve 2. fıkralarına göre: 1. Aracında mavi özel flaşörü yanan ve resmi görevini yerine getiren operasyonel veya özel hizmet aracının sürücüsü, trafik güvenliği koşullarına uyarak, bu Kanunun 25., 31-41. ve 44. maddelerinin yanı sıra bu Kanunun N01 ve N02 sayılı eklerinde belirtilen gerekliliklerden sapabilir. Mavi özel flaşörle birlikte ayrıca kırmızı flaşör de açılabilir. Diğer yol kullanıcılarına karşı öncelik kazanmak için bu aracın sürücüsü mavi özel flaşörü ve sesli sinyali açmalıdır. Öncelikten yalnızca sürücü kendisine yol verildiğinden emin olduğunda yararlanılabilir. 2. Yol kullanıcıları, mavi özel flaşörü ve sesli sinyali açık ve/veya hoparlörle sinyal veren bir operasyonel veya özel hizmet aracı yaklaştığında, bu araç için ve onun eşlik ettiği, kısa farları açık olan araç için yolu boşaltmak, gerekirse durmak zorundadır.',
                ],
                'az' => [
                    'question' => 'Təcili tibbi yardım avtomobilinin göy işıqlı xüsusi mayakı və səs siqnalı yandığı halda, ox istiqamətində hərəkət edən avtomobillər kəsişməni hansı ardıcıllıqla keçməlidir?',
                    'explanation' => 'Gürcüstanın "Yol hərəkəti haqqında" Qanununun 36-cı maddəsinin 4-cü bəndinin "a" yarımbəndinə əsasən, tənzimlənməyən kəsişmədə, bərabər əhəmiyyətli olmayan yolların kəsişməsində, ikinci dərəcəli yolla hərəkət edən nəqliyyat vasitəsinin sürücüsü sonrakı hərəkət istiqamətindən asılı olmayaraq əsas yoldan yaxınlaşan nəqliyyat vasitəsinə yol verməlidir. Eyni Qanunun 51-ci maddəsinin 1-ci və 2-ci bəndlərinə əsasən: 1. Nəqliyyat vasitəsində göy işıqlı xüsusi mayakı yanan və xidməti tapşırığı yerinə yetirən operativ və ya xüsusi xidmət nəqliyyat vasitəsinin sürücüsü, yol hərəkəti təhlükəsizliyi şərtlərinə əməl etməklə, bu Qanunun 25, 31-41 və 44-cü maddələrinin, habelə bu Qanunun N01 və N02 əlavələri ilə müəyyən edilmiş tələblərdən kənara çıxa bilər. Göy işıqlı xüsusi mayakla yanaşı əlavə olaraq qırmızı işıqlı mayak da yandırıla bilər. Digər yol hərəkəti iştirakçıları qarşısında üstünlük əldə etmək üçün bu nəqliyyat vasitəsinin sürücüsü göy işıqlı xüsusi mayakı və səs siqnalını yandırmalıdır. Prioritetdən yalnız sürücü ona yol verildiyinə əmin olduqda istifadə edə bilər. 2. Yol hərəkəti iştirakçıları göy işıqlı xüsusi mayakı və səs siqnalı yanan və/və ya ucaldıcı vasitəsi ilə siqnal verən operativ və ya xüsusi xidmət nəqliyyat vasitəsi yaxınlaşarkən, onun üçün, habelə onun müşayiət etdiyi, yaxın işıqları yanan nəqliyyat vasitəsi üçün yolu boşaltmalı, zərurət yarandıqda isə dayanmalıdır.',
                ],
                'answers' => [
                    9 => [
                        'en' => 'First the ambulance should pass, then the car, and finally the truck',
                        'ru' => 'Сначала должен проехать автомобиль скорой помощи, затем — легковой автомобиль, и в конце — грузовой автомобиль',
                        'tr' => 'Önce ambulans, sonra otomobil, en son kamyon geçmelidir',
                        'az' => 'Əvvəlcə təcili tibbi yardım avtomobili, sonra minik avtomobili, ən sonda isə yük maşını keçməlidir',
                    ],
                    10 => [
                        'en' => 'First the ambulance should pass, then the truck, and finally the car',
                        'ru' => 'Сначала должен проехать автомобиль скорой помощи, затем — грузовой автомобиль, и в конце — легковой автомобиль',
                        'tr' => 'Önce ambulans, sonra kamyon, en son otomobil geçmelidir',
                        'az' => 'Əvvəlcə təcili tibbi yardım avtomobili, sonra yük maşını, ən sonda isə minik avtomobili keçməlidir',
                    ],
                    11 => [
                        'en' => 'First the car should pass, then the ambulance, and finally the truck',
                        'ru' => 'Сначала должен проехать легковой автомобиль, затем — автомобиль скорой помощи, и в конце — грузовой автомобиль',
                        'tr' => 'Önce otomobil, sonra ambulans, en son kamyon geçmelidir',
                        'az' => 'Əvvəlcə minik avtomobili, sonra təcili tibbi yardım avtomobili, ən sonda isə yük maşını keçməlidir',
                    ],
                ],
            ],
        ];

        foreach ($questions as $questionId => $data) {
            foreach (['en', 'ru', 'tr', 'az'] as $locale) {
                DrivingQuestionTranslation::updateOrCreate(
                    ['driving_question_id' => $questionId, 'locale' => $locale],
                    [
                        'question' => $data[$locale]['question'],
                        'explanation' => $data[$locale]['explanation'],
                    ]
                );
            }

            foreach ($data['answers'] as $answerId => $translations) {
                foreach ($translations as $locale => $text) {
                    DrivingAnswerTranslation::updateOrCreate(
                        ['driving_answer_id' => $answerId, 'locale' => $locale],
                        ['answer' => $text]
                    );
                }
            }
        }
    }
}
