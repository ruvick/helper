// Начало работы

// jQuery ================================================
// 1) Подключить библиотеку
// 2) Проверить ее готовность
// 3) Сначала загрузит DOM дерево, после скрипты
// 4) document - сначала загружает весь докумен. ready - после подгружает скрипты
$(document).ready(fuction() {
	//Здесь пишем код
});
// Новый синтаксис 
$(function () {
	//Здесь пишем код 
});


// jQuery в основном предназначен для выборки селекторов ======================================
// Получаем элементы на странице
$('*') // Получаем все селекторы в dom дереве
$('div') // Получаем все селекторы по тегу
$('#div') // Получаем один селектор по id
$('.block') // Получаем все селекторы по классу
$('.block-1, block-2') // Обращаемся к нескольким селекторам


// Работа  с классами ======================================================
// Добавляем класс className для всех элементов с классом .block
$('.block').addClass('className');
// Удаляем класс className у всех элементов с классом .block
$('.block').removeClass('className');
// Удаляем/добавляем класс className для всех элементов с классом .block
$('.block').toggleClass('className');


// Работа со стилями =======================================================
$('h1').css({ 'color': 'red' });
$('.title').css({ 'color': 'red' });
$('#title').css({ 'color': 'red' });
$('form').css({ 'display': "none" });


// Работа с атрибутами =====================================================
// <h1 class="title" title="test-work">Заголовок</h1>
$('h1[title="test-work"]').css({ 'color': 'red' });
// Ищем все атрибуты у которых первое слово test, остальные мы не знаем
$('h1[title|="test"]').css({ 'color': 'red' });
// Ищем все атрибуты у которые содержат слово work, не важно, в начале или в конце, остальные мы не знаем
$('h1[title$="work"]').css({ 'color': 'red' });
// Ищем все атрибуты у которые не содержат слово work, остальные мы не знаем
$('h1[title$!="test-work"]').css({ 'color': 'red' });

// Обращаемся к первой li в списке ul
$('ul li:first').css({ 'color': 'red' });
// Обращаемся ко всем нечетным li в списке ul
$('ul li:even').css({ 'color': 'red' });
// Обращаемся ко всем четным li в списке ul
$('ul li:odd').css({ 'color': 'red' });
// Обращаемся к третьей li в списке ul
$('ul li:nth-child(3)').css({ 'color': 'red' });


// Работа с data атрибутами
// Получаем данные из data атрибутов
// data-id="22"
let id = $('h1').data('id');
console.log(id);
// data-name="Имя"
let nameData = $('h1').data('name');
console.log(nameData);


// :contains(), :empty, :parent, :has
// <h1 class="title" title="test-work">Программирование на Jquerry</h1>
// Находим тег у которого есть слово Программирование 
$('h1:contains("Программирование")').css({ 'color': 'red' });
// Перекрашиваем те li у которых внутри есть тег span
$('ul li:has("span")').css({ 'color': 'red' });
// Перекрасим элементы которые являются родителями каких то элементов, у которых есть контент
$('table tr td:parent').css({ 'background': 'red' });
// Перекрасим элементы которые являются родителями каких то элементов, у которых нет контента
$('table tr td:empty').css({ 'background': 'red' });



// Обработчики событий ================================================================================
// Обычное событие click 
$('.block').click(fuction() {
	// Пишем реакцию на клик
});

// Событие click для работы с динамическими элементами. Рекомендуются всегда использовать его
$('.block').on('click', fuction() {
	// Пишем реакцию на клик
});

// Обработчики событий, через делегирование. Для динамически выводимых элементов
$('body').on('click', '.block', function () {
	// Пишем реакцию на клик
});

// Событие на двойной клик. dblclick
$('button').dblclick(function () {
	// Пишем реакцию на дыойной клик
});

// Событие при наведении на элемент
$('button').mouseenter(function () {
	// Пишем реакцию на наведени
});

// Событие когда убираем мышь с элемента
$('button').mouseleave(function () {
	// Пишем реакцию 
});

// Событие срабатывает, когда мы нажимаем на кнопку
$('button').keydown(function () {
	// Пишем реакцию 
});

// Событие срабатывает, когда мы отпускаем кнопку
$('button').keyup(function () {
	// Пишем реакцию 
});

// Событие срабатывает, когда кнопка нажата
$('button').keypress(function () {
	// Пишем реакцию 
});

// Событие hover 
$('button').hover(function () {
	// Обратимся к текущему обьекту а не ко всем кнопкам с классом button
	$(this).addClass('hover');
	// Если мы укажем вмсето this класс элемента button, то все элементы с этим классом получат этот класс а не тот на который навели
	$('button').addClass('hover');
	// При клике на элемент, будем удалять у него класс
	$(this).on('click', function () {
		$(this).removeClass('hover');
	})
});

// Событие change. Срабатывет когда мы уходим с элемента.
// Отлавливаем инпут по атрибуту name 
$('input[name="name"]').change(function () {
	// Чтобы обратится к текущему элементу, к инпут, пишем this
	// Получаем значение value через функцию val() и присваиваем в переменную
	let value = $(this).val();
	// Передаем значение value инпута в нашу кнопку
	$('button[type="submit"]').val(value);
});

// Будем передавать значение в кнопку, каждый раз когда мы подняли палец с кнопки 
$('input[name="name"]').keyup(function () {
	// Чтобы обратится к текущему элементу, к инпут, пишем this
	// Получаем значение value через функцию val() и присваиваем в переменную
	let value = $(this).val();
	// Передаем значение value инпута в нашу кнопку
	$('button[type="submit"]').val(value);
});

// Событие submit, будет срабатывать когда мы кликаем по кнопке
$('.form').submit(function () {
	alert('Форма успешно отправлена');
});

// События hide() и show(). Мы можем передавать туда время в милисекундах ==========
// Используют display block и none
// Скрывать элемент
$('form').hide(500);

// Показывать элемент 
$('form').show(500);

// Мы можем передавать задержку срабатывания delay
// Показываем форму через 1 секунду. Ждем 5 секунд и скрываем форму
$('form').show(1000).delay(5000).hide(500);

// События fadeIn() и fadeOut(). Мы можем передавать туда время в милисекундах ==========
// Добавляют opacity и убирают.

// Событие attr()
// Получаем любой html атрибут
$('input[name="name"]').attr('value');
$('.input').attr('data-id');
$('.input').data('id');

// События text() и html()
// При помощи этих событий мы можем получить данные и изменить данные
// Текст работает с контентом, html работает с элементами верстки
// Получим текст и параграфа с классом text-info
let textInfo = $('.text-info').text();
console.log(textInfo);
// Если нам нужно заменить текст, передать другой текст
textInfo.text('Новый текст'); // или
$('text-info').text('Новый текст');

// Получим html списка ul
let listElement = $('ul').html();
console.log(listElement);
// Передадим новую констукцию html в наш список ul 
newListElement = '<li>Один</li>';
listElement.html(newListElement);
console.log(newListElement);

// Свойства append и prepend 
// Свойства append добавит в сптсок ul еще один li в конец списка
$('ul').append('<li>Новый пункт</li>');
// Свойства prepend добавит в сптсок ul еще один li в начало списка
$('ul').prepend('<li>Новый пункт</li>');

// Свойства remove() и empty(). empty - в переводе пустота
// Очистим наш список ul с помощью метода empty
$('ul').empty(); // Елемен ul останется, без рунктов li
// Удалим наш список ul полностью
$('ul').remove();

// Свойство after()
// Добавим элемент за список, после него
$('ul').after('<p>Новый текст</p>');
// Добавим пункт li в список ul после последнего li
$('ul li:last-child').after('<li>Текст</li>');

// Свойства wrap и unwrap
// Обернем форму в тег div
$('form').wrap('<div class="wrapper-form></div>');
// Уберем обертку div вокруг нашей формы
$('form').unwrap();

//Инициализация дополнительных библиотек и обьектов
// Пример. Слайдер Slick
$('.slider').slick({
	// Указываем настройки
});
// Инициализация без настроек
$('.slider').slick();

// Событие resize 
// В качестче изменения выбирает элемент в верстве или же само окно браузера
$(window).resize(function () {
	// Используем функции width() и height()
	// Создадим переменную, которая будет получать нш текущий обьект и через свойство width получим ее ширину
	// и в консоль выведем переменную
	let width = $(this).width();
	console.log(width);
});

// Событие scroll
// В качестче изменения выбирает элемент в верстве или же само окно браузера
$(window).scroll(function () {
	// Используем функции width() и height()
	// Создадим переменную, которая будет получать нш текущий обьект и через свойство width получим ее ширину
	// и в консоль выведем переменную
	let scrollElement = $(this).width();
	console.log(scrollElement);
});


// Закрытие по Esc =====================================================================================
$(document).keydown(function (e) {
	if (e.keyCode == 27) {
		//Здесь пишем код
		popup_close(); //Пример
		// window.close();
	}
});


// Анимации ============================================================================================
// Будем анимированно увеличивать ширину обьекта. Вторым параметром, через запятую, задаем скорость
$('#block').animate({ 'width': '100px' }, 2000);

// Смещение страницы при открытии 
$('html, body').animate({ scrollTop: $(document).height() }, 'slow');
return false;


// Анамировано показать блоки с классом .block
// Обращаемся к коллекции блоков. Пишем slideDown. Указываем скорость. Пишем функцию, внутри которой выполняем нужный код
$('.block').slideDown(2000, function () {
	// Код по завершению действия
	console.log('Текст показан!');
})


// При наведении скрывать-показывать блок
function hideMenu() {
	$('.headerCustomMenuDropdown').slideUp(600);
}
function showMenu() {
	$('.headerCustomMenuDropdown').slideDown(600);
}
$(".header-menu__item").on("mouseover", showMenu);
$(".headerCustom-main-part").on("mouseleave", hideMenu);


// Плавный скролл якорных ссылок
$(".menu__list").on("click", "a", function (event) {
	event.preventDefault();
	let id = $(this).attr('href'),
		top = $(id).offset().top;
	$('body,html').animate({ scrollTop: top }, 1500);
});


// AJAX запрос ===================================================================================
// Простеший ajax запрос
$.ajax({
	type: "method",
	url: "url",
	data: "data",
	dataType: "dataType",
	succes: fuction(response) {
	// Обрабатываем ответ
}
});


// Маска телефона =================================================================================
// Работает при подключенной библиотеке jquery.inputmask.bundle.js
var inputmask_phone = { "mask": "+9(999)999-99-99" };
jQuery("input[type=tel]").inputmask(inputmask_phone);


// Валидации ======================================================================================
//Валидация телефона + Отправщик
jQuery(".form__btn").click(function (e) {

	e.preventDefault();
	let name = $(this).siblings('input[name=name]').val();
	let email = $(this).siblings('input[name=email]').val();
	let tel = $(this).siblings('input[name=tel]').val();

	if ((tel == "") || (tel.indexOf("_") > 0)) {
		$(this).siblings('input[name=tel]').css("background-color", "#ff91a4")
	} else {
		let jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'send_work',
				nonce: allAjax.nonce,
				name: name,
				email: email,
				tel: tel,
				formsubject: jQuery(this).data("formname"),
			}
		);

		jqXHR.done(function (responce) {  //Всегда при удачной отправке переход для страницу благодарности
			document.location.href = 'http://...ru/stranicza-blagodarnosti/';
		});

		jqXHR.fail(function (responce) {
			alert("Произошла ошибка. Попробуйте позднее.");
		});
	}

});