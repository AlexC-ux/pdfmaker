<?php
require_once dirname(__FILE__).'/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;



if(isset($_GET["acceppted23"])&&$_GET['email']!=''){
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'otdelenietroismailer@gmail.com';    //Логин
$mail->Password = 'Gergerrara009';                   //Пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
 
$mail->setFrom('otdelenietroismailer@gmail.com', 'Robot');
$mail->isHTML(true);

$mail->CharSet = "utf-8";
$body             = "<h1>Направление на ликвидацию академической задолженности</h1>
<br>
<br>Вы можете <b><a href='http://otdelenietrois.ru/custom/pdfmaker/html2pdf-5.2.4/napravlenie.php?type=napravlenie&view=1&date=".$_GET["date"]."&studgroup=".$_GET['studgroup']."&teacher=".$_GET['teacher']."&studname=".$_GET['studname']."&isexam=".$_GET['isexam']."&zav=".$_GET['zav']."&year=".$_GET['year']."&classes=".$_GET['classes']."&kourse=".$_GET['kourse']."&semestr=".$_GET['semestr']."'>скачать</a></b> документ по ссылке.";


$mail->SetFrom('otdelenietroismailer@gmail.com', '');

$address = $_GET['email'];
$mail->AddAddress($address, "");

$mail->Subject    = "Направление по дисциплине ".$_GET["classes"];

$mail->AltBody    = "Чтобы просмотреть сообщение, используйте HTML-совместимый просмотрщик электронной почты!"; // optional, Закомментировать и протестировать.

$mail->MsgHTML($body);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Сообщение с подписанным направлением отправлено";
}

}
else if(isset($_GET["create"]))
{
    



$search="
    <head>
<link rel='stylesheet' href='style.css'>
<link href='/media/vendor/awesomplete/css/awesomplete.css?1.1.5' rel='stylesheet'>
<link href='/media/vendor/joomla-custom-elements/css/joomla-alert.min.css?0.2.0' rel='stylesheet'>
	<link href='/components/com_sppagebuilder/assets/css/font-awesome-5.min.css?5029e51e66aaf58bae66a64ddc4a848b' rel='stylesheet'>
	<link href='/components/com_sppagebuilder/assets/css/font-awesome-v4-shims.css?5029e51e66aaf58bae66a64ddc4a848b' rel='stylesheet'>
	<link href='/components/com_sppagebuilder/assets/css/animate.min.css?5029e51e66aaf58bae66a64ddc4a848b' rel='stylesheet'>
	<link href='/components/com_sppagebuilder/assets/css/sppagebuilder.css?5029e51e66aaf58bae66a64ddc4a848b' rel='stylesheet'>
	<link href='/components/com_sppagebuilder/assets/css/jquery.bxslider.min.css' rel='stylesheet'>
	<link href='/media/com_sppagebuilder/css/page-2.css' rel='stylesheet'>
	<link href='/plugins/system/jce/css/content.css?aa754b1f19c7df490be4b958cf085e7c' rel='stylesheet'>
	<link href='/templates/shaper_helixultimate/css/bootstrap.min.css' rel='stylesheet'>
	<link href='/plugins/system/helixultimate/assets/css/system-j4.min.css' rel='stylesheet'>
	<link href='/plugins/system/helixultimate/assets/css/choices.css' rel='stylesheet'>
	<link href='/media/system/css/joomla-fontawesome.min.css?9e9a6c0aad121f072906cdf2eaf830e4' rel='stylesheet'>
	<link href='/templates/shaper_helixultimate/css/template.css' rel='stylesheet'>
	<link href='/templates/shaper_helixultimate/css/presets/preset1.css' rel='stylesheet'>
    </head>

<form action='' style='padding-left:15px'>
<div>
<input type='hidden' name='access'></input>
<p><b>Ваш Email</b></p>
<input type='text' name='email'></input>
<small><p>Например: mail@example.com</p></small>


<p><b>Вид документа</b></p>
<select name='type' class='select-css'>
<option value='napravlenie'>Направление на ликвидацию академической задолженности</option>
</select>


<p><b>Номер группы</b></p>
<input type='text' name='studgroup'></input>
<small><p>Например: МОВХ-151</p></small>



<p><b>ФИО преподавателя полностью</b></p>
<input type='text' name='teacher'></input>
<small><p>Например: Петрова Елена Сергеевна</p></small>


<p><b>ФИО студента полностью</b></p>
<input type='text' name='studname'></input>
<small><p>Например: Иванов Пётр Сергеевич</p></small>

<p><b>Заведующий отделением</b></p>
<select name='zav' class='select-css'>
<option value='trois'>Тальпис А.А. - зав. отд. ТРОиИС</option>
</select>

<p><b>Год поступления</b></p>
<select name='year' class='select-css'>
<option value='2021'>2021</option>
<option value='2020'>2020</option>
<option value='2019'>2019</option>
<option value='2018'>2018</option>
<option value='2017'>2017</option>
</select>


<p><b>Название дисциплины полностью</b></p>
<select name='classes' class='select-css'>
<option value=' Архитектура аппаратных средств '> Архитектура аппаратных средств </option>
<option value=' Астрономия '> Астрономия </option>
<option value=' Безопасность жизнедеятельности '> Безопасность жизнедеятельности </option>
<option value=' Биология '> Биология </option>
<option value=' Введение в специальность '> Введение в специальность </option>
<option value=' Вычислительная техника '> Вычислительная техника </option>
<option value=' География '> География </option>
<option value=' Дискретная математика с элементами математической логики '> Дискретная математика с элементами математической логики </option>
<option value=' Естествознание '> Естествознание </option>
<option value=' Индивидуальный проект '> Индивидуальный проект </option>
<option value=' Инженерная компьютерная графика '> Инженерная компьютерная графика </option>
<option value=' Иностранный язык '> Иностранный язык </option>
<option value=' Иностранный язык в профессиональной деятельности '> Иностранный язык в профессиональной деятельности </option>
<option value=' Информатика '> Информатика </option>
<option value=' Информационные технологии '> Информационные технологии </option>
<option value=' История '> История </option>
<option value=' История транспорта России '> История транспорта России </option>
<option value=' Компьютерные сети '> Компьютерные сети </option>
<option value=' Литература '> Литература </option>
<option value=' Литература (включая Родную литературу) '> Литература (включая Родную литературу) </option>
<option value=' Математика '> Математика </option>
<option value=' МДК.01.01 Раздел 1. Сети электросвязи '> МДК.01.01 Раздел 1. Сети электросвязи </option>
<option value=' МДК.01.01 Раздел 2. Техническая эксплуатация и обслуживание волоконно-оптических линий передачи '> МДК.01.01 Раздел 2. Техническая эксплуатация и обслуживание волоконно-оптических линий передачи </option>
<option value=' МДК.01.01 Раздел 3. Цифровая схемотехника '> МДК.01.01 Раздел 3. Цифровая схемотехника </option>
<option value=' МДК.01.01 Раздел 4. Радиосвязь с подвижными объектами '> МДК.01.01 Раздел 4. Радиосвязь с подвижными объектами </option>
<option value=' МДК.01.01 Теоретические основы монтажа, ввода в действие и эксплуатации устройств транспортного радиоэлектронного оборудования '> МДК.01.01 Теоретические основы монтажа, ввода в действие и эксплуатации устройств транспортного радиоэлектронного оборудования </option>
<option value=' МДК.01.01 Технология разработки программного обеспечения '> МДК.01.01 Технология разработки программного обеспечения </option>
<option value=' МДК.01.01 Эксплуатация информационной системы '> МДК.01.01 Эксплуатация информационной системы </option>
<option value=' МДК.01.02 Инструментальные средства разработки программного обеспечения '> МДК.01.02 Инструментальные средства разработки программного обеспечения </option>
<option value=' МДК.01.02 Методы и средства проектирования информационных систем '> МДК.01.02 Методы и средства проектирования информационных систем </option>
<option value=' МДК.01.03 Безопасность функционирования информационных систем '> МДК.01.03 Безопасность функционирования информационных систем </option>
<option value=' МДК.01.03 Математическое моделирование '> МДК.01.03 Математическое моделирование </option>
<option value=' МДК.01.04 Информационные системы и технологии на железнодорожном транспорте '> МДК.01.04 Информационные системы и технологии на железнодорожном транспорте </option>
<option value=' МДК.01.05 Обработка отраслевой экономической информации на железнодорожном транспорте '> МДК.01.05 Обработка отраслевой экономической информации на железнодорожном транспорте </option>
<option value=' МДК.02.01 Информационные технологии и платформы разработки информационных систем '> МДК.02.01 Информационные технологии и платформы разработки информационных систем </option>
<option value=' МДК.02.01 Многоканальные системы передачи и Системы передачи данных  '> МДК.02.01 Многоканальные системы передачи и Системы передачи данных  </option>
<option value=' МДК.02.01 Моделирование и анализ программного обеспечения '> МДК.02.01 Моделирование и анализ программного обеспечения </option>
<option value=' МДК.02.01 Основы построения и технической эксплуатации многоканальных систем передачи '> МДК.02.01 Основы построения и технической эксплуатации многоканальных систем передачи </option>
<option value=' МДК.02.02 Измерения в технике связи '> МДК.02.02 Измерения в технике связи </option>
<option value=' МДК.02.02 Технология диагностики и измерений параметров радиоэлектронного оборудования и сетей связи '> МДК.02.02 Технология диагностики и измерений параметров радиоэлектронного оборудования и сетей связи </option>
<option value=' МДК.02.02 Управление проектами '> МДК.02.02 Управление проектами </option>
<option value=' МДК.02.03 Основы технического обслуживания и ремонта оборудования и устройств оперативно-технологической связи на транспорте '> МДК.02.03 Основы технического обслуживания и ремонта оборудования и устройств оперативно-технологической связи на транспорте </option>
<option value=' МДК.02.03 Раздел 1. Оперативно-технологическая связь на железнодорожном транспорте '> МДК.02.03 Раздел 1. Оперативно-технологическая связь на железнодорожном транспорте </option>
<option value=' МДК.02.03 Раздел 2. Системы телекоммуникаций '> МДК.02.03 Раздел 2. Системы телекоммуникаций </option>
<option value=' МДК.02.03 Системы искусственного интеллекта '> МДК.02.03 Системы искусственного интеллекта </option>
<option value=' МДК.03.01 Проектирование и дизайн информационных систем '> МДК.03.01 Проектирование и дизайн информационных систем </option>
<option value=' МДК.03.01 Раздел 1. Информационные технологии в профессиональной деятельности '> МДК.03.01 Раздел 1. Информационные технологии в профессиональной деятельности </option>
<option value=' МДК.03.01 Раздел 2. Сотовая и транкинговая связь '> МДК.03.01 Раздел 2. Сотовая и транкинговая связь </option>
<option value=' МДК.03.01 Раздел 3. Цифровые системы коммутации '> МДК.03.01 Раздел 3. Цифровые системы коммутации </option>
<option value=' МДК.03.01 Раздел 4. Основы конструкторско-проектной деятельности '> МДК.03.01 Раздел 4. Основы конструкторско-проектной деятельности </option>
<option value=' МДК.03.01 Технологии программирования, инсталляции и ввода в действие транспортного радиоэлектронного оборудования (по видам транспорта) (на железнодорожном транспорте) '> МДК.03.01 Технологии программирования, инсталляции и ввода в действие транспортного радиоэлектронного оборудования (по видам транспорта) (на железнодорожном транспорте) </option>
<option value=' МДК.03.02 Открытые операционные системы '> МДК.03.02 Открытые операционные системы </option>
<option value=' МДК.03.02 Разработка кода информационных систем '> МДК.03.02 Разработка кода информационных систем </option>
<option value=' МДК.03.03 Тестирование информационных систем '> МДК.03.03 Тестирование информационных систем </option>
<option value=' МДК.04.01 Внедрение ИС '> МДК.04.01 Внедрение ИС </option>
<option value=' МДК.04.01 Планирование и организация работы структурного подразделения '> МДК.04.01 Планирование и организация работы структурного подразделения </option>
<option value=' МДК.04.02 Инженерно-техническая поддержка сопровождения ИС '> МДК.04.02 Инженерно-техническая поддержка сопровождения ИС </option>
<option value=' МДК.04.02 Современные технологии управления структурным подразделением '> МДК.04.02 Современные технологии управления структурным подразделением </option>
<option value=' МДК.04.03 Устройство и функционирование информационной системы '> МДК.04.03 Устройство и функционирование информационной системы </option>
<option value=' МДК.04.04 Интеллектуальные системы и технологии '> МДК.04.04 Интеллектуальные системы и технологии </option>
<option value=' МДК.05.01 Ремонт и обслуживание аппаратуры и устройств связи '> МДК.05.01 Ремонт и обслуживание аппаратуры и устройств связи </option>
<option value=' МДК.05.01 Управление и автоматизация баз данных '> МДК.05.01 Управление и автоматизация баз данных </option>
<option value=' МДК.05.02 Сертификация информационных систем '> МДК.05.02 Сертификация информационных систем </option>
<option value=' Менеджмент в профессиональной деятельности '> Менеджмент в профессиональной деятельности </option>
<option value=' Метрология и стандартизация '> Метрология и стандартизация </option>
<option value=' Метрология, стандартизация, сертификация и техническое документоведение '> Метрология, стандартизация, сертификация и техническое документоведение </option>
<option value=' Обществознание '> Обществознание </option>
<option value=' Общий курс железных дорог '> Общий курс железных дорог </option>
<option value=' Операционные системы '> Операционные системы </option>
<option value=' Операционные системы и среды '> Операционные системы и среды </option>
<option value=' Организация и технология отрасли '> Организация и технология отрасли </option>
<option value=' Основы алгоритмизации и программирования '> Основы алгоритмизации и программирования </option>
<option value=' Основы архитектуры, устройство и функционирование вычислительных систем '> Основы архитектуры, устройство и функционирование вычислительных систем </option>
<option value=' Основы безопасности жизнедеятельности '> Основы безопасности жизнедеятельности </option>
<option value=' Основы безопасности жизнедеятельности (ОБЖ) '> Основы безопасности жизнедеятельности (ОБЖ) </option>
<option value=' Основы безопасность жизнедеятельности '> Основы безопасность жизнедеятельности </option>
<option value=' Основы бухгалтерского учета '> Основы бухгалтерского учета </option>
<option value=' Основы бухгалтерского учета и налогообложения '> Основы бухгалтерского учета и налогообложения </option>
<option value=' Основы проектирования баз данных '> Основы проектирования баз данных </option>
<option value=' Основы философии '> Основы философии </option>
<option value=' Основы финансовой грамотности '> Основы финансовой грамотности </option>
<option value=' Открытые операционные системы '> Открытые операционные системы </option>
<option value=' Охрана труда '> Охрана труда </option>
<option value=' ПM.03.Эм Экзамен по модулю (демонстрационный экзамен) '> ПM.03.Эм Экзамен по модулю (демонстрационный экзамен) </option>
<option value=' ПM.04.Эм Экзамен по модулю '> ПM.04.Эм Экзамен по модулю </option>
<option value=' ПM.05.Эм Экзамен по модулю '> ПM.05.Эм Экзамен по модулю </option>
<option value=' ПМ.01 Монтаж, ввод в действие и эксплуатация устройств транспортного радиоэлектронного оборудования '> ПМ.01 Монтаж, ввод в действие и эксплуатация устройств транспортного радиоэлектронного оборудования </option>
<option value=' ПМ.01 Осуществление интеграции программных модулей '> ПМ.01 Осуществление интеграции программных модулей </option>
<option value=' ПМ.01 Эксплуатация и модификация информационных систем '> ПМ.01 Эксплуатация и модификация информационных систем </option>
<option value=' ПМ.01.ЭК Квалификационный экзамен '> ПМ.01.ЭК Квалификационный экзамен </option>
<option value=' ПМ.01.ЭК Экзамен квалификационный '> ПМ.01.ЭК Экзамен квалификационный </option>
<option value=' ПМ.01.Эм Экзамен по модулю (демонстрационный экзамен) '> ПМ.01.Эм Экзамен по модулю (демонстрационный экзамен) </option>
<option value=' ПМ.02 Ревьюирование программных модулей '> ПМ.02 Ревьюирование программных модулей </option>
<option value=' ПМ.02 Техническая эксплуатация сетей и устройств связи, обслуживание и ремонт транспортного радиоэлектронного оборудования '> ПМ.02 Техническая эксплуатация сетей и устройств связи, обслуживание и ремонт транспортного радиоэлектронного оборудования </option>
<option value=' ПМ.02 Участие в разработке информационных систем '> ПМ.02 Участие в разработке информационных систем </option>
<option value=' ПМ.02.ЭК Квалификационный экзамен '> ПМ.02.ЭК Квалификационный экзамен </option>
<option value=' ПМ.02.ЭК Экзамен квалификационный '> ПМ.02.ЭК Экзамен квалификационный </option>
<option value=' ПМ.02.Эм Экзамен по модулю '> ПМ.02.Эм Экзамен по модулю </option>
<option value=' ПМ.03 Выполнение работ по одной или нескольким профессиям рабочих, должностям служащих '> ПМ.03 Выполнение работ по одной или нескольким профессиям рабочих, должностям служащих </option>
<option value=' ПМ.03 Использование программного обеспечения в процессе эксплуатации микропроцессорных устройств '> ПМ.03 Использование программного обеспечения в процессе эксплуатации микропроцессорных устройств </option>
<option value=' ПМ.03 Проектирование и разработка информационных систем '> ПМ.03 Проектирование и разработка информационных систем </option>
<option value=' ПМ.03.ЭК Квалификационный экзамен '> ПМ.03.ЭК Квалификационный экзамен </option>
<option value=' ПМ.03.ЭК Экзамен квалификационный '> ПМ.03.ЭК Экзамен квалификационный </option>
<option value=' ПМ.04 Сопровождение информационных систем '> ПМ.04 Сопровождение информационных систем </option>
<option value=' ПМ.04 Участие в организации производственной деятельности малого структурного подразделения организации '> ПМ.04 Участие в организации производственной деятельности малого структурного подразделения организации </option>
<option value=' ПМ.04.ЭК Квалификационный экзамен '> ПМ.04.ЭК Квалификационный экзамен </option>
<option value=' ПМ.05 Выполнение работ по одной или нескольким профессиям рабочих, должностям служащих '> ПМ.05 Выполнение работ по одной или нескольким профессиям рабочих, должностям служащих </option>
<option value=' ПМ.05 Соадминистрирование и автоматизация баз данных и серверов '> ПМ.05 Соадминистрирование и автоматизация баз данных и серверов </option>
<option value=' ПМ.05.ЭК Квалификационный экзамен '> ПМ.05.ЭК Квалификационный экзамен </option>
<option value=' ПП.01.01 Производственная практика '> ПП.01.01 Производственная практика </option>
<option value=' ПП.01.01 Производственная практика (по профилю специальности) '> ПП.01.01 Производственная практика (по профилю специальности) </option>
<option value=' ПП.02.01 Производственная практика '> ПП.02.01 Производственная практика </option>
<option value=' ПП.02.01 Производственная практика (по профилю специальности) '> ПП.02.01 Производственная практика (по профилю специальности) </option>
<option value=' ПП.03.01 Производственная практика '> ПП.03.01 Производственная практика </option>
<option value=' ПП.03.01 Производственная практика (по профилю специальности) '> ПП.03.01 Производственная практика (по профилю специальности) </option>
<option value=' ПП.04.01 Производственная практика '> ПП.04.01 Производственная практика </option>
<option value=' ПП.04.01 Производственная практика (по профилю специальности) '> ПП.04.01 Производственная практика (по профилю специальности) </option>
<option value=' ПП.05.01 Производственная практика '> ПП.05.01 Производственная практика </option>
<option value=' Правовое обеспечение профессиональной деятельности '> Правовое обеспечение профессиональной деятельности </option>
<option value=' Прикладная математика '> Прикладная математика </option>
<option value=' Психология и этика деловых отношений '> Психология и этика деловых отношений </option>
<option value=' Психология общения '> Психология общения </option>
<option value=' Радиотехнические цепи и сигналы '> Радиотехнические цепи и сигналы </option>
<option value=' Родная литература '> Родная литература </option>
<option value=' Родной язык '> Родной язык </option>
<option value=' Россия в мире '> Россия в мире </option>
<option value=' Русский язык '> Русский язык </option>
<option value=' Русский язык (включая Родной язык) '> Русский язык (включая Родной язык) </option>
<option value=' Русский язык и культура речи '> Русский язык и культура речи </option>
<option value=' Русский язык и культура речи: практика устной и письменной коммуникации '> Русский язык и культура речи: практика устной и письменной коммуникации </option>
<option value=' Стандартизация, сертификация и техническое документоведение '> Стандартизация, сертификация и техническое документоведение </option>
<option value=' Теория вероятностей и математическая статистика '> Теория вероятностей и математическая статистика </option>
<option value=' Теория электрических цепей '> Теория электрических цепей </option>
<option value=' Теория электросвязи '> Теория электросвязи </option>
<option value=' Техническая эксплуатация железных дорог и безопасность движения '> Техническая эксплуатация железных дорог и безопасность движения </option>
<option value=' Технические средства информатизации '> Технические средства информатизации </option>
<option value=' Транспортная безопасность '> Транспортная безопасность </option>
<option value=' УП.01.01 Учебная практика '> УП.01.01 Учебная практика </option>
<option value=' УП.02.01 Учебная практика '> УП.02.01 Учебная практика </option>
<option value=' УП.02.01 Учебная практика (по программированию) '> УП.02.01 Учебная практика (по программированию) </option>
<option value=' УП.03.01 Учебная практика '> УП.03.01 Учебная практика </option>
<option value=' УП.03.01 Учебная практика (практика по рабочей профессии 16199 Оператор электронно-вычислительных и вычислительных машин) '> УП.03.01 Учебная практика (практика по рабочей профессии 16199 Оператор электронно-вычислительных и вычислительных машин) </option>
<option value=' УП.04.01 Учебная практика '> УП.04.01 Учебная практика </option>
<option value=' УП.05.01 Учебная практика '> УП.05.01 Учебная практика </option>
<option value=' УП.05.01 Учебная практика по рабочей профессии 19876 Электромонтер по ремонту и обслуживанию аппаратуры и устройств связи '> УП.05.01 Учебная практика по рабочей профессии 19876 Электромонтер по ремонту и обслуживанию аппаратуры и устройств связи </option>
<option value=' Устройство и функционирование информационной системы '> Устройство и функционирование информационной системы </option>
<option value=' Физика '> Физика </option>
<option value=' Физическая культура '> Физическая культура </option>
<option value=' Химия '> Химия </option>
<option value=' Численные методы '> Численные методы </option>
<option value=' Экология '> Экология </option>
<option value=' Экология на железнодорожном транспорте '> Экология на железнодорожном транспорте </option>
<option value=' Экономика отрасли '> Экономика отрасли </option>
<option value=' Электронная техника '> Электронная техника </option>
<option value=' Электропитание устройств связи '> Электропитание устройств связи </option>
<option value=' Электрорадиоизмерения '> Электрорадиоизмерения </option>
<option value=' Электротехника и электроника '> Электротехника и электроника </option>
<option value=' Электротехническое черчение '> Электротехническое черчение </option>
<option value=' Элементы высшей математики '> Элементы высшей математики </option>
<option value=' Элементы математической логики '> Элементы математической логики </option>
</select>

<p><b>За какой курс задолженность</b></p>
<select name='kourse' class='select-css'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
</select>

<p><b>За какой семестр задолженность</b></p>
<select name='semestr' class='select-css'>
<option value='1'>1</option>
<option value='2'>2</option>
</select>

<p><b>Нужна ли экзаменационная ведомость?</b></p>
<select name='isexam' class='select-css'>
<option value='0'>Нет</option>
<option value='1'>Да</option>
</select>
<small><p>Экзаминационная ведомость нужна, если Вы пересдаёте экзамен, если Вы пересдаёте диф. зачёт<br>или иную форму аттестации, то такая ведомость не нужна</p></small>

<p><input type='submit' value='Отправить на подпись' class='sppb-btn  sppb-btn-default sppb-btn-lg sppb-btn-round button'></p>
</div></form>
";
echo($search);
    
    
}
else if($_GET["type"]=="napravlenie" && isset($_GET["view"])==False){
$mails = array(
    "trois" => "otdelenietrois@gmail.com"
);


$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'otdelenietroismailer@gmail.com';    //Логин
$mail->Password = 'Gergerrara009';                   //Пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
 
$mail->setFrom('otdelenietroismailer@gmail.com', 'Robot');
$mail->isHTML(true);
$mail->CharSet = "utf-8";
$body             = "<h1>Запрос на направление!</h1>
<br>
<br>Студент: <a href='mailto:".$_GET["email"]."'>".$_GET['studname']."</a>
<br>Группа: ".$_GET['studgroup']."
<br>Дисциплина: ".$_GET['classes']."
<br>Преподаватель: ".$_GET['teacher']."
<br>За ".$_GET['kourse']." курс
<br>За ".$_GET['semestr']." семестр
<br>
<br>Чтобы просмотреть подписанное направление перейдите по <b><a href='http://otdelenietrois.ru/custom/pdfmaker/html2pdf-5.2.4/napravlenie.php?view=1&date=".date("d.m.Y")."&type=napravlenie&view=1&studgroup=".$_GET['studgroup']."&email=".$_GET['email']."&teacher=".$_GET['teacher']."&studname=".$_GET['studname']."&isexam=".$_GET['isexam']."&zav=".$_GET['zav']."&year=".$_GET['year']."&classes=".$_GET['classes']."&kourse=".$_GET['kourse']."&semestr=".$_GET['semestr']."'>ссылке</a></b>.
<br>
<br>Чтобы отправить подписанное направление перейдите по <b><a href='http://otdelenietrois.ru/custom/pdfmaker/html2pdf-5.2.4/napravlenie.php?acceppted23&date=".date("d.m.Y")."&type=napravlenie&view=1&studgroup=".$_GET['studgroup']."&email=".$_GET['email']."&teacher=".$_GET['teacher']."&studname=".$_GET['studname']."&isexam=".$_GET['isexam']."&zav=".$_GET['zav']."&year=".$_GET['year']."&classes=".$_GET['classes']."&kourse=".$_GET['kourse']."&semestr=".$_GET['semestr']."'>ссылке</a></b>.";



$mail->SetFrom('otdelenietroismailer@gmail.com', '');

$address = $mails[$_GET['zav']];
$mail->AddAddress($address, "");

$mail->Subject    = "Запрос на направление ".$_GET["classes"];

$mail->AltBody    = "Чтобы просмотреть сообщение, используйте HTML-совместимый просмотрщик электронной почты!"; // optional, Закомментировать и протестировать.

$mail->MsgHTML($body);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Переадресация на предыдущую страницу, ожидайте.";
}
    echo("<script>
    alert('Направление отправлено на подпись, ожидайте ответа на указанный адрес электронной почты:".$_GET["email"]."');
    window.location.href = '/custom/pdfmaker/html2pdf-5.2.4/napravlenie.php?create';
    </script>");
}
else if(isset($_GET["view"])&&$_GET["view"]=="1"){

try { 
    $_GET["studgroup"] = mb_strtoupper($_GET['studgroup']);


    $sign = array(/*подписи завов*/
        "trois" => "<div style='position: absolute;top:267;left:520;font-size:11pt;'>А. А. Тальпис</div>
        <div style='position: absolute;top:256;left:362;font-size:11pt;'><img style='width:60px;' src='backgrounds/atalpispodpis.jpg'/></div>"
    );
    
    $semestr =intval((intval($_GET["kourse"])*2)-(bcmod(intval($_GET["semestr"]),2)));
    
    $html2pdf = new Html2Pdf('L', 'A5', 'fr');

    $content = file_get_contents(K_PATH_MAIN.'examples/data/utf8test.txt');
    
    
    
    $content = '<page style="font-family: freeserif">
<img src="backgrounds/napravlenie_1page.png" alt="" style="position:absolute;height:100%"/>
    
    <div style="position: absolute;top:64;left:125;font-size:8pt;color:grey;">'.$_GET["year"].'</div>
    <div style="position: absolute;top:121;left:107;font-size:11pt;">'.$_GET["studname"].'</div>
    <div style="position: absolute;top:121;left:480;font-size:11pt;">'.$_GET["studgroup"].'</div>
    
    <div style="position: absolute;top:157;left:255;font-size:11pt;">'.$_GET["teacher"].'</div>';
    if (247>strlen($_GET["classes"]) && strlen($_GET["classes"])>123){
        $_GET["classes"] = mb_substr($_GET["classes"], 0,70)."-<br>".mb_substr($_GET["classes"], 70, 71)."-<br>".mb_substr($_GET["classes"], 141, strlen($_GET["classes"]));

        $content = $content."<div style='position: absolute;top:196;left:265;font-size:9pt;'>";
    }
    elseif (strlen($_GET["classes"])>246) {
    $_GET["classes"] = mb_substr($_GET["classes"], 0,70)."-<br>".mb_substr($_GET["classes"], 70, 71)."-<br>".mb_substr($_GET["classes"], 141, strlen($_GET["classes"]));

        $content = $content."<div style='position: absolute;top:186;left:235;font-size:9pt;'>";
    }
    elseif (strlen($_GET["classes"])<124) {
        $content = $content."<div style='position: absolute;top:205;left:237;font-size:11pt;'>";
        
    }
    $content = $content.$_GET["classes"].'</div>
    <div style="position: absolute;top:229;left:75;font-size:11pt;">'.$_GET["kourse"].'</div>
    <div style="position: absolute;top:229;left:131;font-size:11pt;">'.$semestr.'</div>
    <div style="position: absolute;top:306;left:55;font-size:9pt;">*направление действительно 14 дней</div>
    <div style="position: absolute;top:267;left:220;font-size:11pt;">'.$_GET["date"].'</div>
    <div style="position: absolute;top:339;left:105;font-size:11pt;">'.$_GET["studname"].'</div>
    <div style="position: absolute;top:411;left:150;font-size:11pt;">'.$_GET["teacher"].'</div>
    '.$sign[$_GET["zav"]].
    '</page>';

    //Создание экзаменационной ведомости при необходимости
    if ($_GET["isexam"]=="1"){
        $groups = array(
            "МОРО" => "<div style='position: absolute;top:177;left:180;font-size:10pt;'>Техническая  эксплуатация транспортного радиоэлектронного оборудования</div>",
            "МОИС" => "<div style='position: absolute;top:177;left:180;font-size:10pt;'>Информационные системы (по отраслям)</div>",
            "МОИП" => "<div style='position: absolute;top:177;left:180;font-size:10pt;'>Информационные системы и программирование</div>",
        );




        $content = $content.'<page style="font-family: freeserif">
<img src="backgrounds/napravlenie_2page.png" alt="" style="position:absolute;height:100%"/>
<div style="position: absolute;top:220;left:103;font-size:11pt;">'.$_GET["studgroup"].'</div>
'.$groups[mb_substr($_GET['studgroup'],0,4)].'
<div style="position: absolute;top:273;left:100;font-size:10pt;">'.$_GET["studname"].'</div>
<div style="position: absolute;top:382;left:329;font-size:11pt;">'.$_GET["teacher"].'</div>';


    if (247>strlen($_GET["classes"]) && strlen($_GET["classes"])>123){
        $content = $content."<div style='position: absolute;top:146;left:170;font-size:9pt;'>".$_GET["classes"]."</div>";
    }
    elseif (strlen($_GET["classes"])>246) {
        $content = $content."<div style='position: absolute;top:136;left:170;font-size:9pt;'>".$_GET["classes"]."</div>";
    }
    elseif (strlen($_GET["classes"])<124) {
        $content = $content."<div style='position: absolute;top:155;left:170;font-size:10pt;'>".$_GET["classes"]."</div>";
        }
        $content = $content.'</page>';
    }
    
    

    $html2pdf->pdf->SetDisplayMode('real');
    $html2pdf->writeHTML($content);
    $html2pdf->output('file'.date("H:i:s").'.pdf');

    
    
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
}
?>