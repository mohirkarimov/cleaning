<?php

namespace App\MoonShine\Resources;

use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Code;
use MoonShine\Fields\Color;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\SlideField;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\Models\MoonshineUser;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;


class ArticleResource extends Resource
{
    public static string $model = Post::class;

    public static string $title = 'Статьи';

    public static string $subTitle = 'Хорошие статьи';

    public string $titleField = 'title';

    // public static array $activeActions = ['show'];


    // protected bool $editInModal = true;
    //
    // protected bool $createInModal = true;

//
//    public static int $itemsPerPage = 5;
//
//    public static string $orderField = 'title';
//
//    public static string $orderType = 'DESC';
//
//    public function query(): Builder
//    {
//        return parent::query()->where('id',  '>' , 3);
//    }


    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('post nomi', 'title'),
            Textarea::make('post nomi', 'short_content'),


            Text::make('post nomi', 'content')
                ->fieldContainer(false)
                ->required(),

            Image::make('post nomi', 'photo')
                ->removable()
                ->disk('public')
                ->dir('post-photos')
                ->allowedExtensions(['jpg', 'gif', 'png']),


















//            Grid::make([
//                Column::make([
//                    Block::make('Основная информация', [
//                        BelongsTo::make('Автор', 'author' , fn($user) => $user->id . ' | ' . $user->name)
//                            ->nullable()
//                            ->searchable(),
//                        Collapse::make('Заголовок/Slug', [
//                            Flex::make([
//                                Text::make('Заголовок', 'title')
//                                    ->fieldContainer(false)
//                                    ->required(),
//
//                                Slug::make('Slug', 'Slug')
//                                    ->fieldContainer(false)
//                                    ->from('title')
//                                    ->separator('-')
//                                    ->unique(),
//
//
//                            ]),
//                        ]),
//
//                        Tabs::make([
//                            Tab::make('описание', [
//                                TinyMce::make('Описание', 'description')
//                                    ->hideOnIndex(),
//
//                            ]),
//
//                            Tab::make('Seo', [
//                                Text::make('Seo Title')->hideOnIndex(),
//                                Textarea::make('Seo description')->hideOnIndex(),
//                            ]),
//
//                        ]),
//
//
//                        Url::make('link')
//                            ->expansion('https'),
////                            ->eye()
////                            ->copy()
////                            ->locked(),
//
//
//                        SlideField::make('Возрастное ограничение' , 'age')
//                        ->fromField('age_from')
//                        ->toField('age_to')
//                        ->min(0)
//                        ->max(75)
//                        ->step(1),
//
//                        File::make('Файлы' , 'files')
//                        ->removable()
//                        ->disk('public')
//                        ->dir('articles'),
//
////                        ->multiple()   agar kop fayl oladgan bose ishlatamiz
////                        ->canDownload()
////
////
////
////                        Json::make('Data')
////                            ->keyValue('Title', 'Value')
////                            ->removable()
////
////
////                        Code::make('Code')
//
//
//                    ]),
//
//                ])->columnSpan(8),
//
//                Column::make([
//
//                    Block::make('Дополнительная информация', [
//                        Image::make('Обложка', 'thumbnail')
//                            ->removable()
//                            //->multiple()
//                            ->disk('public')
//                            ->dir('articles')
//                            ->allowedExtensions(['jpg', 'gif', 'png']),
//
////                        Tabs::make([
////
////                            Tab::make('Вкладка 1', [
////
////                                Heading::make('Заголовок'),
////                                Text::make('Заголовок', 'title')
////                                    ->hint('Подсказка')
////                                    ->addLink('Link', 'https://cutcode.dev')
////                                    ->required()
////                            ]),
////
////                            Tab::make('Вкладка 2', [
////                                Text::make('Заголовок', 'title')
////                                    ->hint('Подсказка')
////                                    ->addLink('Link', 'https://cutcode.dev')
////                                    ->required()
////                            ]),
////                        ]),
//
//                        Number::make('Рейтинг', 'rating')
//                            //->hideOnIndex()
//                            ->stars()
//                            ->min(0)
//                            ->max(5),
//                            //->step(1),
//
//
//                        Color::make('Цвет', 'color'),
//
//                        SwitchBoolean::make('Опубликовать' , 'active')
//                            //->autoUpdate()
//                    ]),
//
//
//                ])->columnSpan(4),
//
//            ]),

        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
