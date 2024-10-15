<?php

namespace KennedyOsaze\PhpCsFixerConfig;

use PhpCsFixer\Config as FixerConfig;
use PhpCsFixer\Finder;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;
use PhpCsFixerCustomFixers\Fixer\CommentSurroundedBySpacesFixer;
use PhpCsFixerCustomFixers\Fixer\ConstructorEmptyBracesFixer;
use PhpCsFixerCustomFixers\Fixer\EmptyFunctionBodyFixer;
use PhpCsFixerCustomFixers\Fixer\MultilineCommentOpeningClosingAloneFixer;
use PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer;
use PhpCsFixerCustomFixers\Fixer\NoDuplicatedArrayKeyFixer;
use PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer;
use PhpCsFixerCustomFixers\Fixer\NoPhpStormGeneratedCommentFixer;
use PhpCsFixerCustomFixers\Fixer\NoSuperfluousConcatenationFixer;
use PhpCsFixerCustomFixers\Fixer\NoTrailingCommaInSinglelineFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer;
use PhpCsFixerCustomFixers\Fixer\NoUselessStrlenFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocNoIncorrectVarAnnotationFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocNoSuperfluousParamFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocParamTypeFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocSelfAccessorFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocTypesCommaSpacesFixer;
use PhpCsFixerCustomFixers\Fixer\PhpdocTypesTrimFixer;
use PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceAfterStatementFixer;
use PhpCsFixerCustomFixers\Fixer\SingleSpaceBeforeStatementFixer;
use PhpCsFixerCustomFixers\Fixers;

class Config
{
    /**
     * Create a new config instance.
     *
     * @param Finder $finder
     * @param array $rules
     * @param bool $isRiskAllowed
     *
     * @return FixerConfig
     */
    public static function create(Finder $finder, array $rules = [], bool $isRiskAllowed = true): FixerConfig
    {
        return (new FixerConfig('kennedy-osaze/php-cs-fixer-config'))
            ->setParallelConfig(ParallelConfigFactory::detect())
            ->setFinder($finder)
            ->registerCustomFixers(new Fixers())
            ->setRules(array_merge(self::getDefaultRules(), $rules))
            ->setRiskyAllowed($isRiskAllowed);
    }

    /**
     * Return an array of default rules for PHP-CS-Fixer.
     *
     * @return array<string, mixed>
     */
    public static function getDefaultRules(): array
    {
        return [
            // PHP-CS-Fixer rules
            '@PER-CS2.0' => true,
            'align_multiline_comment' => true,
            'array_push' => true,
            'assign_null_coalescing_to_coalesce_equal' => true,
            'attribute_empty_parentheses' => true,
            'backtick_to_shell_exec' => true,
            'binary_operator_spaces' => true,
            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'continue',
                    'declare',
                    'do',
                    'exit',
                    'for',
                    'foreach',
                    'goto',
                    'if',
                    'phpdoc',
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                ],
            ],
            'braces_position' => true,
            'class_attributes_separation' => [
                'elements' => [
                    'const' => 'only_if_meta',
                    'method' => 'one',
                    'property' => 'one',
                    'trait_import' => 'none',
                    'case' => 'none',
                ],
            ],
            'class_definition' => [
                'inline_constructor_arguments' => true,
                'space_before_parenthesis' => true,
                'single_line' => true,
            ],
            'class_reference_name_casing' => true,
            'clean_namespace' => true,
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'combine_nested_dirname' => true,
            'comment_to_phpdoc' => true,
            'concat_space' => true,
            'declare_parentheses' => true,
            'dir_constant' => true,
            'echo_tag_syntax' => true,
            'empty_loop_body' => true,
            'empty_loop_condition' => true,
            'explicit_indirect_variable' => true,
            'explicit_string_variable' => true,
            'fopen_flag_order' => true,
            'fully_qualified_strict_types' => true,
            'function_declaration' => true,
            'global_namespace_import' => true,
            'heredoc_indentation' => true,
            'implode_call' => true,
            'include' => true,
            'integer_literal_case' => true,
            'lambda_not_used_import' => true,
            'linebreak_after_opening_tag' => true,
            'list_syntax' => true,
            'logical_operators' => true,
            'long_to_shorthand_operator' => true,
            'magic_constant_casing' => true,
            'magic_method_casing' => true,
            'mb_str_functions' => true,
            'modernize_strpos' => true,
            'modernize_types_casting' => true,
            'method_chaining_indentation' => true,
            'multiline_comment_opening_closing' => true,
            'multiline_whitespace_before_semicolons' => true,
            'native_function_casing' => true,
            'native_type_declaration_casing' => true,
            'no_alias_functions' => ['sets' => ['@all']],
            'no_alias_language_construct_call' => true,
            'no_alternative_syntax' => true,
            'no_binary_string' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_phpdoc' => true,
            'no_empty_statement' => true,
            'no_extra_blank_lines' => [
                'tokens' => [
                    'attribute',
                    'break',
                    'case',
                    'continue',
                    'curly_brace_block',
                    'default',
                    'extra',
                    'parenthesis_brace_block',
                    'return',
                    'square_brace_block',
                    'switch',
                    'throw',
                    'use',
                ],
            ],
            'no_leading_namespace_whitespace' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_mixed_echo_print' => true,
            'no_null_property_initialization' => true,
            'no_php4_constructor' => true,
            'no_short_bool_cast' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_around_offset' => true,
            'no_superfluous_elseif' => true,
            'no_trailing_comma_in_singleline' => true,
            'no_unneeded_braces' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unneeded_final_method' => true,
            'no_unneeded_import_alias' => true,
            'no_unset_cast' => true,
            'no_unset_on_property' => true,
            'no_unused_imports' => true,
            'no_useless_concat_operator' => true,
            'no_useless_else' => true,
            'no_useless_nullsafe_operator' => true,
            'no_useless_return' => true,
            'no_useless_sprintf' => true,
            'no_whitespace_before_comma_in_array' => true,
            'normalize_index_brace' => true,
            'not_operator_with_successor_space' => true,
            'nullable_type_declaration' => true,
            'nullable_type_declaration_for_default_null_value' => true,
            'object_operator_without_whitespace' => true,
            'operator_linebreak' => true,
            'ordered_class_elements' => [
                'order' => ['use_trait', 'case'],
            ],
            'ordered_imports' => [
                'imports_order' => [
                    'class',
                    'function',
                    'const',
                ],
                'sort_algorithm' => 'alpha',
            ],
            'php_unit_construct' => true,
            'php_unit_dedicate_assert_internal_type' => true,
            'php_unit_expectation' => true,
            'php_unit_fqcn_annotation' => true,
            'php_unit_method_casing' => true,
            'php_unit_namespaced' => true,
            'php_unit_set_up_tear_down_visibility' => true,
            'php_unit_strict' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_align' => ['align' => 'left'],
            'phpdoc_annotation_without_dot' => true,
            'phpdoc_indent' => true,
            'phpdoc_inline_tag_normalizer' => true,
            'phpdoc_line_span' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_alias_tag' => true,
            'phpdoc_no_package' => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_order' => true,
            'phpdoc_param_order' => true,
            'phpdoc_return_self_reference' => true,
            'phpdoc_scalar' => true,
            'phpdoc_separation' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_tag_casing' => true,
            'phpdoc_to_comment' => true,
            'phpdoc_trim' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'phpdoc_var_annotation_correct_order' => true,
            'phpdoc_var_without_name' => true,
            'pow_to_exponentiation' => true,
            'return_assignment' => true,
            'self_accessor' => true,
            'self_static_accessor' => true,
            'semicolon_after_instruction' => true,
            'set_type_to_cast' => true,
            'simple_to_complex_string_variable' => true,
            'simplified_if_return' => true,
            'simplified_null_return' => true,
            'single_class_element_per_statement' => true,
            'single_line_comment_spacing' => true,
            'single_line_comment_style' => true,
            'single_quote' => true,
            'single_trait_insert_per_statement' => true,
            'space_after_semicolon' => true,
            'standardize_not_equals' => true,
            'switch_continue_to_break' => true,
            'ternary_to_elvis_operator' => true,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline' => [
                'elements' => ['arguments', 'arrays', 'match', 'parameters'],
            ],
            'trim_array_spaces' => true,
            'type_declaration_spaces' => true,
            'types_spaces' => true,
            'unary_operator_spaces' => true,
            'whitespace_after_comma_in_array' => true,

            // Custom rules
            NoDuplicatedImportsFixer::name() => true,
            NoPhpStormGeneratedCommentFixer::name() => true,
            NoSuperfluousConcatenationFixer::name() => true,
            PhpdocNoIncorrectVarAnnotationFixer::name() => true,
            SingleSpaceAfterStatementFixer::name() => true,
            SingleSpaceBeforeStatementFixer::name() => true,
            NoUselessParenthesisFixer::name() => true,
            CommentSurroundedBySpacesFixer::name() => true,
            EmptyFunctionBodyFixer::name() => true,
            ConstructorEmptyBracesFixer::name() => true,
            MultilineCommentOpeningClosingAloneFixer::name() => true,
            NoDuplicatedArrayKeyFixer::name() => true,
            NoTrailingCommaInSinglelineFixer::name() => true,
            NoUselessStrlenFixer::name() => true,
            PhpdocNoSuperfluousParamFixer::name() => true,
            PhpdocParamTypeFixer::name() => true,
            PhpdocSelfAccessorFixer::name() => true,
            PhpdocTypesCommaSpacesFixer::name() => true,
            PhpdocTypesTrimFixer::name() => true,
            PromotedConstructorPropertyFixer::name() => true,
            NoUselessDirnameCallFixer::name() => true,
            MultilinePromotedPropertiesFixer::name() => [
                'minimum_number_of_parameters' => 3,
            ],
        ];
    }
}
