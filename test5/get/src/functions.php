<?php

/**
 *  Тип шаблона:
 *  - FILE - шаблон - файл, его загрузка через include
 *  - STRING - шаблон - строка, его загрузка через eval
 */
enum TplType
{
    case FILE;
    case STRING;
}

/**
 * Выполняет указанный HTML-шаблон с PHP переменными
 *
 * @param string $tpl - полный путь до HTML-шаблона или строка собс-но шаблона
 * @param array $vars - массив переменных
 * @param TplType $tpltype - FILE - в $tpl - полный путь до HTML-шаблона, STRING - в $tpl - текст шаблона
 * @return string
 */
function renderTpl(string $tpl, array $vars = [], TplType $tplType = TplType::FILE) : string
{
    if ( count($vars) ) {
        extract($vars, EXTR_OVERWRITE);
    }

    ob_start();
    if ($tplType === TplType::FILE) {
        include $tpl;
    } else {
        eval( '?>' . $tpl . '<?php echo PHP_EOL;' );
    }

    return ob_get_clean();
}

