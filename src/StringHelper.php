<?php
/**
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license proprietary
 * @version 17.08.21 20:53:12
 */

declare(strict_types = 1);
namespace dicr;

/**
 * Строковые утилиты.
 */
class StringHelper
{
    /**
     * Меняет порядок букв в слове, сохраняя регистр.
     *
     * @param string $word
     * @return string
     */
    public static function reverseWord(string $word): string
    {
        if ($word === '') {
            return '';
        }

        // получаем буквы
        $letters = mb_str_split($word);

        // получаем регистры
        $cases = array_map(
            static fn($letter) => preg_match('~[A-ZА-Я]~u', $letter),
            $letters
        );

        // меняем порядок букв
        $letters = array_reverse($letters);

        // восстанавливаем регистр
        foreach ($letters as $i => $letter) {
            $letters[$i] = ('mb_strto' . ($cases[$i] ? 'upper' : 'lower'))($letter);
        }

        // склеиваем и возвращаем
        return implode('', $letters);
    }

    /**
     * Инверсия порядка букв в словах строки.
     *
     * @param string $str
     * @return string
     */
    public static function reverseWords(string $str): string
    {
        // ускоряем процесс граничных случаев
        if ($str === '') {
            return '';
        }

        // переставляем буквы только в словах
        $parts = [];
        foreach (preg_split('~\b~um', $str) as $i => $part) {
            $parts[] = $i % 2 === 0 ? $part : self::reverseWord($part);
        }

        // склеиваем и возвращаем
        return implode('', $parts);
    }
}
