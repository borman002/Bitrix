Создал раздел /dobavlenie-po-kodu/.

Скопировал в папку local/components/mgor/ компоненты catalog.search, catalog.section, catalog.item из bitrix/components.

На странице /dobavlenie-po-kodu/ разместил компонент mgor/catalog.search. В файле result_modifier.php (mgor/catalog.search/bootstrap_v4) добавил поиск товара по свойству Артикул торгового предложения через GetList. Значение берется из GET.

В шаблоне компонента mgor/catalog.seсtion, используемом для вывода результатов mgor/catalog.search, в файле result_modifier.php (mgor/catalog.seсtion/bootstrap_v4) убираю лишние торговые предложения, сравнивая значение свойства Артикул торгового предложения с искомым в запросе GET, так как битрикс из коробки не выдает поиск торговых предложений.

Передаю обработанный массив arResult в компонент mgor/catalog.item/bootstrap_v4, где верстка шаблона card изменена в соответствии с заданием.
