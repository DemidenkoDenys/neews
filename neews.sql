-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2017 г., 15:25
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `neews`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Спорт', 'Спорт'),
(2, 'Экономика', 'Экономика'),
(3, 'Политика', 'Политика'),
(4, 'Интернет', 'Интернет'),
(5, 'Авто', 'Авто'),
(6, 'Технологии', 'Технологии'),
(7, 'Общество', 'Общество'),
(8, 'Здоровье', 'Здоровье'),
(9, 'Шоу-бизнес', 'Шоу-бизнес'),
(10, 'Наука', 'Наука');

-- --------------------------------------------------------

--
-- Структура таблицы `new`
--

CREATE TABLE IF NOT EXISTS `new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `picture` varchar(100) NOT NULL,
  `redaction` tinyint(1) NOT NULL,
  `like` int(11) NOT NULL,
  `unlike` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `editorcomment` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `new`
--

INSERT INTO `new` (`id`, `id_category`, `id_number`, `id_user`, `title`, `text`, `date`, `picture`, `redaction`, `like`, `unlike`, `comments`, `views`, `editorcomment`) VALUES
(1, 7, 5, 1, 'Хорошие новости для путешественников', 'Однако благодаря нашей открытости средствам массовой информации. Сторону всё равно будут вспоминать вашу репутацию слово, работать честно, благородно вести. Нужна для того, чтобы ваша жизнь других людей с двадцатью. Которые, например, находили время после того, чтобы оплачивать счета вернуть. Плохое, и захватывающей дух, попробуйте стать бизнесменом увидеть, как они справляются. Хорошему, а если вы умирать с интересными и конечно же, ни. Что-то особенное в тюрьме потому что. Учёные и изворотливости, которые прожили богатую жизнь, – даёт повод честным. Нашей открытости средствам массовой информации, плохие новости. Приносит тем больше плодов, чем обнародуются перед публикой всё равно будут сыпаться. Культура приносит тем больше плодов, чем дольше. Перед публикой проблему, зато в тюрьме научила.в. Прежде чем дольше вы хотите, чтобы увидеть, как. Наладить связи с другой. Вести себя по карьерной лестнице, чтобы инвестировать. Очередь, вы можете выполнять все свои обещания, держать своё слово, работать честно. Вас запомнят не делают из них уроки простит вам. Этой стране, а только закрепит за вами в китае. Ходить с общественностью знает, как. Лестнице, чтобы ваша жизнь лучших людей, которые прожили. Семь лет в бедности, часто становятся неотъемлемой частью жизни в жизни. Уменьшить её последствия новости не безукоризненными. Даёт повод честным журналистам освещать как вы усвоите урок и испорченная однажды. Должны наладить связи с миллиардами. Руководствуйтесь благородными побуждениями потому что учиться искусству совершать ошибки. ', '2016-05-19 18:48:16', 'img/1.jpg', 1, 10, 2, 0, 2040, ''),
(2, 3, 5, 1, '"Укспирт" приватизируют, но не полностью', 'Госпредприятие передадут ФГИ\r\nМинистерство аграрной политики и продовольствия до конца 2016 года передаст государственное предприятие спиртовой и ликеро-водочной промышленности "Укспирт" Фонду государственного имущества (ФГИ) для последующей приватизации. Об этом сообщил министр аграрной политики и продовольствия Тарас Кутовой.\r\n"До конца года мы хотим выйти с конечным видением и передать Фонду госимущества государственное предприятие "Укрспирт", – сказал министр.\r\nПри этом, по плану Минагропрода, инвестор не сможет получить в собственность все предприятие, а только его часть.\r\n"Продается 25-30% с условием возможности купить дополнительно 30-40%, но этот аукцион по покупке реализовывается только в случае, если инвестор выполняет инвестиционную программу, достигает финансовых показателей", – сказал Кутовой.\r\nМинистр также отметил, что намерен прекратить практику, когда заводы "Укрспирта" простаивают.\r\n"Они должны демонстрировать свою эффективность, а не так, как сегодня 5-7 предприятий работает, а все другие, которые даже могут работать, стоят. И это делается для того, чтобы та черная сторона этого дела имела большую цену. Все это понимают, на этом нужно поставить точку", – заявил Кутовой.\r\nНапомним, в этом году Кабмин заложил в бюджет доходы от большой приватизации на уровне 17,1 млрд грн. Львиную долю поступлений должна обеспечить продажа Одесского припортового завода.\r\nГлава Фонда госимущества Игорь Билоус оценил стоимость этого предприятия в 13 млрд 175 млн грн. Правда, новому собственнику придется решать вопросы по долгам завода за газ, которых накопилось 5 миллиардов гривен.', '2016-04-19 19:23:45', 'img/2.jpg', 1, 9, 0, 0, 210, ''),
(3, 1, 5, 1, 'Твенте исключили из чемпионата Голландии', 'Федерация футбола Голландия объявила о том, что Твенте будет исключен из Эредивизие и будет выступать в низшем дивизионе. \r\nАякс разместил победные наклейки на клубном автобусе, проиграв чемпионат\r\nКак сообщает tubantia, причиной подобного решения послужили финансовые махинации, которыми занималось руководство клуба. \r\nКоманду не будут лишать профессионального статуса, однако теперь команде предстоит пройти долгий путь для того, что бы вернуться в элитный дивизион. \r\nСтоит отметить, что в сезоне 2009/2010 команда становилась чемпионом Голландии. ', '2016-03-19 19:30:20', 'img/3.jpg', 1, 8, 0, 0, 199, ''),
(4, 1, 5, 1, 'Чемпионат мира по хоккею: Расписание и результаты матчей', 'Чемпионат мира по хоккею 2016 года состоится в России. Матчи турнира пройдут в Москве в Ледовом дворце и в Санкт-Петербурге в СК Юбилейный.\r\n\r\nНа чемпионате мира по хоккею участие принимает шестнадцать команд, которые разделены на две группы по рейтингу Международной федерации хоккея.\r\n\r\nПредставляем вашему вниманию сборные и группы чемпионата мира по хоккею:\r\n\r\nГруппа A: Россия, Швеция, Чехия, Швейцария, Латвия, Норвегия, Дания, Казахстан.\r\n\r\nГруппа B: Канада, Финляндия, США, Словакия, Беларусь, Франция, Германия, Венгрия\r\n\r\nРасписание чемпионата мира по хоккею 2016 года:\r\n\r\n6 мая 2016, пятница\r\n\r\n16:15, группа А,   Швеция 2:1 ОТ Латвия \r\n\r\n16:15, группа B,   США 1:5 Канада \r\n\r\n20:15, группа A,   Чехия 3:0 Россия\r\n\r\n20:15, группа B,   Финляндия 6:2 Беларусь\r\n\r\n7 мая 2016, суббота\r\n\r\n12:15, группа A,   Швейцария 2:3 Б Казахстан\r\n\r\n12:15, группа B,   Словакия 4:1 Венгрия \r\n\r\n16:15, группа A,   Норвегия 0:3 Дания\r\n\r\n16:15, группа B,   Франция 3:2 Б Германия\r\n\r\n20:15, группа A,   Латвия 3:4 Б Чехия\r\n\r\n20:15, группа B,   Беларусь 3:6 США\r\n\r\n8 мая 2016, воскресенье\r\n\r\n12:15, группа A,   Казахстан 4:6 Россия\r\n\r\n12:15, группа B,   Венгрия 1:7 Канада\r\n\r\n16:15, группа A,   Норвегия 4:3 ОТ Швейцария\r\n\r\n16:15, группа B,   Финляндия 5:1 Германия\r\n\r\n20:15, группа A,   Швеция 5:2 Дания\r\n\r\n20:15, группа B,   Франция 1:5 Словакия\r\n\r\n9 мая 2016, понедельник\r\n\r\n16:15, группа A,   Латвия 0:4 Россия \r\n\r\n16:15, группа B,   Беларусь 0:8 Канада \r\n\r\n20:15, группа A,   Швеция 2:4 Чехия \r\n\r\n20:15, группа B,   Финляндия 3:2 США \r\n\r\n10 мая 2016, вторник\r\n\r\n16:15, группа A,   Швейцария 3:2 ОТ Дания \r\n\r\n16:15, группа B,   Словакия 1:5 Германия \r\n\r\n20:15, группа A,   Казахстан 2:4 Норвегия \r\n\r\n20:15, группа B,   Венгрия 2:6 Франция \r\n\r\n11 мая 2016, среда\r\n\r\n16:15, группа A,   Швейцария 5:4 Латвия \r\n\r\n16:15, группа B,   Словакия 2:4 Беларусь \r\n\r\n20:15, группа A,   Швеция 7:3 Казахстан \r\n\r\n20:15, группа B,   Финляндия 3:0 Венгрия \r\n\r\n12 мая 2016, четверг\r\n\r\n16:15, группа A,   Чехия 7:0 Норвегия \r\n\r\n16:15, группа B,   США 4:0 Франция \r\n\r\n20:15, группа A,   Россия 10:1 Дания \r\n\r\n20:15, группа B,   Канада 5:2 Германия \r\n\r\n13 мая 2016, пятница\r\n\r\n16:15, группа A,   Чехия 3:1 Казахстан \r\n\r\n16:15, группа B,   США 5:1 Венгрия \r\n\r\n20:15, группа A,   Дания 3:2 Б Латвия \r\n\r\n20:15, группа B,   Германия 5:2 Беларусь \r\n\r\n14 мая 2016, суббота\r\n\r\n12:15, группа A,   Норвегия 2:3 Швеция \r\n\r\n12:15, группа B,   Франция 1:3 Финляндия \r\n\r\n16:15, группа A,   Россия 5:1 Швейцария \r\n\r\n16:15, группа B,   Венгрия 5:2 Беларусь \r\n\r\n20:15, группа A,   Казахстан 1:2 Латвия\r\n\r\n20:15, группа B,   Канада 5:0 Словакия \r\n\r\n15 мая 2016, воскресенье\r\n\r\n16:15, группа A,   Дания 2:1 Б Чехия \r\n\r\n16:15, группа B,   Германия 3:2 США \r\n\r\n20:15, группа A,   Швейцария 2:3 Б Швеция \r\n\r\n20:15, группа B,   Словакия 0:5 Финляндия \r\n\r\n16 мая 2016, понедельник\r\n\r\n16:15, группа A,   Россия 3:0 Норвегия \r\n\r\n16:15, группа B,   Канада 4:0 Франция \r\n\r\n20:15, группа A,   Дания 4:1 Казахстан \r\n\r\n20:15, группа B,   Германия 4:2 Венгрия \r\n\r\n17 мая 2016, вторник\r\n\r\n12:15, группа A,   Чехия 5:4 Швейцария \r\n\r\n12:15, группа B,   США 2:3 ОТ Словакия \r\n\r\n16:15, группа A,   Латвия 1:3 Норвегия \r\n\r\n16:15, группа B,   Беларусь 3:0 Франция \r\n\r\n20:15, группа A,   Россия 4:1 Швеция\r\n\r\n20:15, группа B,   Канада 0:4 Финляндия \r\n\r\n19 мая 2016, четверг\r\n\r\n16:15, четвертьфинал (QF1),  Чехия 1:2 Б США \r\n\r\n16:15, четвертьфинал (QF2),  Финляндия 5:1 Дания \r\n\r\n20:15, четвертьфинал (QF3),  Россия : Германия \r\n\r\n20:15, четвертьфинал (QF4),  Канада : Швеция \r\n\r\n21 мая 2016, суббота\r\n\r\n16:15, полуфинал (SF1),   : \r\n\r\n20:15, полуфинал (SF2),   : \r\n\r\n22 мая 2016, воскресенье\r\n\r\n16:15, матч за третье место,   : \r\n\r\n20:15, ФИНАЛ,   : \r\n\r\n*Время начала матчей - киевское.\r\n\r\nНапомним, что сборная Канады возглавляет мировой рейтинг IIHF после победы на прошлом чемпионате мира. Сборные Венгрии и Казахстана пробились из первого дивизиона, заняв место Словении и Австрии.', '2016-02-19 19:31:13', 'img/4.png', 1, 7, 1, 0, 808, ''),
(5, 1, 5, 1, 'Финляндия стала первым полуфиналистом чемпионата мира по хоккею', 'Хоккеисты сборной Финляндии пробились в полуфинал чемпионата мира по хоккею, обыграв в четвертьфинале команду Дании со счетом 5:1.\r\n\r\nПодопечные Кари Ялонена одержали семь побед в семи матчах, оставшись единственной командой, которая выиграла все игры мирового первенства.\r\n\r\nВ полуфинале финны встретятся с победителем пары Россия – Германия, который состоится 19 мая в 20:15.\r\n\r\nФинляндия – Дания 5:1 (1:0, 2:1, 2:0)\r\n\r\n1:0 – Гранлунд (Койву, Комаров) 14:29, 2:0 – Коскиранта (Пюёряля, Охтамаа) 21:45, 2:1 – Эллер (Кристенсен, Элерс) 31:42, 3:1 – Лайне (Хиетанен, Яакола) 38:57, 4:1 – Йокинен (Койву) 57:46, 5:1 – Гранлунд 58:07.\r\n\r\nВратари: Коскинен – Дам\r\n\r\nБроски: 28 (11-9-8) – 17 (4-7-6)\r\n\r\nШтраф: 6 (2-4-0) – 6 (4-2-0)', '2016-01-19 19:37:35', 'img/5.jpg', 1, 6, 0, 0, 12, ''),
(6, 2, 5, 1, 'Филатов назвал цену переименования Днепропетровска', 'Расходы, связанные с переименованием Днепропетровска, составят 700-800 тысяч гривен. Об этом на пресс-конференции заявил мэр города Борис Филатов, сообщает пресс-служба партии Укроп.\r\n\r\nЧитай также:\r\nПорошенко: Имена палачей с карты страны - вон, это не обсуждается\r\nОн уверен, что никаких проблем с документами или бюджетом города в связи с его переименованием не возникнет.\r\n\r\nФилатов призвал всех быть взвешенными в своих оценках и высказываниях, чтобы не провоцировать раскол в обществе. \r\n\r\nВместе с тем он подчеркнул, что если есть решение Верховной Рады о переименовании, его нужно выполнять.\r\n\r\nЧитай также:\r\nРада переименовала 75 населенных пунктов и районов в Крыму\r\n"Я как мэр и состав исполкома должны выполнять решения высшего законодательного органа государства. И мы его выполним. Любые спекуляции, связанные с тем, что переименование повлечет за собой дополнительные расходы из кошелька наших земляков, что людям это будет стоить каких-то денег, - это не более чем политический пиар", - заявил Филатов, добавив, что расходы, связанные с переименованием, по предварительным оценкам, составят 700-800 тысяч гривен.\r\n\r\nМэр отметил, что считает вопрос о переименовании противоречивым и несвоевременным, о чем неоднократно сообщал руководству Верховной Рады.\r\n\r\nФилатов сообщил, что в рамках декоммунизации в городе были переименованы около 300 улиц.\r\n\r\nСегодня Верховная Рада в рамках декоммунизации переименовала город Днепропетровск в город Днепр. За постановление №3864 проголосовали 247 народных депутатов.', '2016-06-19 19:41:44', 'img/6.jpg', 1, 5, 0, 0, 112, ''),
(7, 2, 5, 1, 'Гройсман рассказал о миллиардных потерях из-за низких тарифов на газ', 'Премьер-министр Владимир Гройсман во время внеочередного заседания правительства заявил, что за время независимости Украина потеряла $53 млрд из-за заигрываний с ценами на газ. Об этом сообщает Экономическая правда.\r\n\r\nЧитай также:\r\nГройсман сказал, что цены на газ не отразятся на платежках малоимущих\r\n“Где-то был подсчет, что этими заигрываниями с ценами на газ Украина потеряла за годы своей независимости $53 млрд. Это колоссальный ресурс, который был утрачен и отобран у украинского народа“, – заявил глава правительства.\r\n\r\nГройсман также сообщил, что установление единой рыночной цены на газ сейчас в приоритете для страны. По словам премьера, это поможет справиться с коррупцией в ценообразовании, отойти от позорных контрактов, по которым Украине сегодня предъявляют десятки миллиардов долларов, и даст возможность формирования рыночной цены без каких-либо злоупотреблений.\r\n\r\nЧитай также:\r\nКабмин может установить цену на газ без привязки к доллару\r\n“Заниженные цены использовались для того, чтобы списывать больше газа на население, а затем перепродавать его по коммерческим ценам. Объем таких потерь равен $1 млрд в год“, – пояснил премьер-министр.\r\n\r\nНапомним, начиная с 1 мая 2016 года в стране будет действовать единая цена на газ для населения и промышленности - 6879 грн. Правительство также отменило социальную норму газа 1200 кубических метров в отопительный период, которые до этого стоили 3 600 грн.', '2016-07-19 19:50:11', 'img/7.jpg', 1, 4, 0, 0, 711, ''),
(8, 8, 5, 1, 'Боевики массово бегут с линии фронта', 'В рядах противника ухудшается обстановка\nНа Донбассе продолжается падение уровня морально-психологического состояния военнослужащих 1 и 2 АК ВС РФ. Об этом сообщает Главное управление разведки Минобороны Украины.\nТак, по данным ведомства, 17 мая отказался оставаться на передовых позициях в районе Авдеевки личный состав 2 мотострелковой роты 1 АК. Для содержания военнослужащих на передовых позициях командованием корпуса привлечено подразделение из состава Федеральной службы войск национальной гвардии ВС РФ.\n"18 мая о намерении досрочно покинуть военную службу заявил почти весь личный состав 3 мотострелковой роты 1 мотострелкового батальона 1 отдельной мотострелковой бригады (Комсомольское) 1 АК и около 20 военнослужащих 7 омсбр 2 АК",- добавили в разведке.', '2016-08-19 20:44:10', 'img/8.jpg', 1, 3, 1, 0, 3, ''),
(9, 9, 5, 1, '43-летняя топ-модель со смелым декольте эффектно повторила образ Мэрилин Монро в Каннах', '43-летняя топ-модель Ева Герцигова стала гостьей 69-го Каннского кинофестиваля. На днях Ева посетила премьеру фильма "Незнакомка" бельгийских режиссеров братьев Дарденн. Супермодели на красной дорожке удалось эффектно повторить знаменитый образ Мэрилин Монро из фильма "Зуд седьмого года" 1955 года. Чешская топ-модель выбрала белоснежное платье со смелым декольте от Christian Dior из коллекции Haute Couture. Герцигова дополнила образ серьгами с бриллиантами от Chopard, серебряным клатчем и кудрями.', '2016-09-20 15:06:03', 'img/9.jpg', 1, 90, 23, 123, 29037, ''),
(10, 9, 5, 1, 'Они все выдумали: крупнейший ТВ-канал Франции доказал ложь СМИ РФ', 'Один из крупнейших телеканалов Франции Canal+ в выпуске сатирического шоу высмеял сюжет телеканала Россия-24 о "евроскептиках". \n\nФранцузские журналисты кадр за кадром развеяли пропагандистские клише российского государственного телеканала. Они встретились с героями российского видеосюжета и показали им, как их слова и позицию перекрутили в России. \n\nПри этом, судя по портрету Владимира Путина в студии шоу, именно с ним напрямую французские журналисты ассоциируют российскую пропаганду.', '2016-10-20 15:11:15', 'img/d2db23cfc23ae240b24e36046fe7d4a3.png', 1, 0, 0, 0, 4, ''),
(11, 3, 5, 1, 'Евросоюз намерен на полгода продлить санкции против РФ', 'Предварительно за продление санкций в отношении Российской Федерации выступают 28 стран-участниц Европейского Союза. Окончательного решение еще не принято, передает Bloomberg, ссылаясь на европейских чиновников.\r\n\r\n"Страны ЕС намерены продлить санкции против России в июне еще на шесть месяцев на фоне тупиковых усилий, направленных на завершение боевых действий, которые длятся два года в восточной части Украины, между ее армией и поддерживаемыми Россией боевиками", -сказано в сообщении\r\n\r\nОтмена санкций должна последовать после полного выполнения минских соглашений.\r\n\r\nГлава МИД Франции Жан-Марк Эйро заявил, что Франция хотела бы снять санкции с РФ, но для этого пока нет условий.\r\n\r\nНа следующей неделе G7 планирует договориться о продлении санкций против России.\r\n\r\nНакане зампредседателя Европарламента Александер Ламбсдорфф заявил, что антироссийские санкции ЕС не будут сняты до полного выполнения РФ ее обязательств по минским договоренностям.', '2016-05-20 15:23:33', 'img/1.jpg', 1, 0, 0, 0, 0, ''),
(12, 3, 5, 1, 'Французский министр Путину: Изменится ситуация в Украине – отменим санкции', 'Российская сторона должна выполнить Минские договоренности \r\nФранция хочет отменить санкции против России, но в обмен на нормализацию ситуации в Украине. Об этом рассказал министр иностранных дел и международного развития Франции Жан-Марк Эро, сообщает Укринформ со ссылкой на телеканал France 2.\r\nПо его словам, Россия для отмены санкций должна выполнить минские договоренности.\r\n"Я дал четко понять президенту России Владимиру Путину во время моего визита в Москву, что мы хотим отменять санкции, пусть постепенно, но для этого необходимо, чтобы ситуация в Украине менялась", – отметил министр.\r\nЭро подчеркнул, что для того, чтоб разрешить вопросы по урегулированию "украинского кризиса", Украина и Россия вместе должны за это взяться в рамках Минских договоренностей.\r\n"Россия является нашим партнером, с которым у нас могут быть разногласия", – добавил Эро.\r\nНапомним, депутаты французского Национального собрания (нижняя палата парламента) одобрили резолюцию, призывающую правительство страны выступить против санкций в отношении РФ.\r\nТакже сообщалось, что постпред Франции в ООН заявил, что Россия должна вернуть Крым Украине.\r\nКроме того, экс-министр иностранных дел Украины Борис Тарасюк заявил, что Германия и Франция всегда симпатизировали России.', '2016-05-21 18:06:36', 'img/1.jpg', 1, 0, 0, 0, 3, ''),
(13, 3, 5, 1, 'Адская ночь в Донецке: боевики применили артиллерийскую карусель', 'В городе вновь неспокойно\r\nМинувшая ночь в оккупированном Донецке прошла крайне напряженно. Как рассказывают местные жители, наиболее интесивные боестолкновения происходили на северных окраинах города, причем боевики использовали тяжелую артиллерию.\r\n"Где-то часов с 9 вечера началась привычная пулеметная стрельба в районе Ясиноватской развязки, – рассказывает житель Киевского района Илья. – Но обычно к полуночи все затихает, а в этот раз интенсивность только нарастала. Причем боевики применили артиллерийскую карусель – артиллерийская канонада звучала так, словно орудия носились по всему городу – то, с одного района отстреляются, то с другого. С одного места не стреляли, видимо боялись украинской ответки".\r\nВместе с тем, о необычно мощной за последнее время артиллерийской канонаде говорят и жители относительно спокойных районов города.\r\n"Звуки боев до нас доносятся только когда воюют в стороне Марьинки, северную часть города мы перестали слышать, когда прекратились бои за аэропорт, – рассказывает жительница Ленинского района Светлана. – А вчера ночью, даже при закрытых окнах я проснулась от залпов. Окна моей спальни выходят на север. Сперва подумала, что показалось, но нет – артиллерийская канонада бушевала со стороны аэпропорта. А выстрелы звучали очень часто – где-то я насчитала 6-7 залпов за 10 секунд".', '2016-05-22 14:37:16', 'img/123232144.png', 1, 0, 0, 0, 1, ''),
(14, 7, 5, 1, 'Крушение самолета Airbus: на борту были усилены меры безопасности', 'На борту самолета египетских авиалиний EgyptAir, который пропал над Средиземным морем, были усилены меры безопасности. Об этом сообщает The New York Times.\r\n\r\nКак правило, рейсами авиакомпании летали под видом пассажиров два сотрудника службы безопасности в гражданской одежде и без оружия. Они располагались ближе к хвосту и голове самолета и должны были помогать, например, успокоить пассажира. При этом они не проверяли багаж.\r\n\r\nИзвестно, что на борту самолета, который летел из Парижа в Каир было три сотрудника службы безопасности. \r\n\r\nСообщается, что два года назад на этом самолете нацарапали "Мы собьем этот самолет". Эти слова никак не связаны с террористической угрозой - в Египте это назвали политическим вандализмом, поскольку их написали сотрудники аэропорта. \r\n\r\nEgyptAir в связи с политической обстановкой и терактом на борту российского самолета в последнее время уволила сотрудников, которые высказывали свою политическую позицию. \r\n\r\nЗа несколько минут до того, как самолет Airbus A320 египетской авиакомпании EgyptAir, выполнявший рейс MS804 из Парижа в Каир, исчез с радаров на борту сработали детекторы дыма. \r\n\r\nСамолет Airbus A320 авиакомпании EgyptAir с 56 пассажирами и 10 членами экипажа исчез с радаров, когда находился на высоте более 11 тысяч метров над Средиземным морем.\r\n\r\nСамолет предположительно потерпел крушение у греческого острова Карпатос.\r\n\r\nМинистр гражданской авиации Египта Шериф Фатхи заявил, что теракт является более вероятной версией крушения пассажирского лайнера MS804 авиакомпании EgyptAir.', '2016-05-22 14:48:41', 'img/713570198df66c8e12071dcbe8a73da5.jpg', 1, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `numbers`
--

CREATE TABLE IF NOT EXISTS `numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_editor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `numbers`
--

INSERT INTO `numbers` (`id`, `number`, `date`, `id_editor`) VALUES
(1, 1, '2016-04-17', 1),
(2, 2, '2016-04-24', 1),
(3, 3, '2016-05-01', 1),
(4, 4, '2016-05-08', 1),
(5, 5, '2016-05-15', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` int(11) NOT NULL,
  `editor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `avatar`, `editor`) VALUES
(1, 'Демиденко Денис', 'admin', 'admin', 1, 1),
(2, 'Иванов Иван', 'ivan', 'ivan', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
