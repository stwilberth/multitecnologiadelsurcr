<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Catálogo';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state));
                            $set('meta_title', $state);
                        }
                    })
                    ->label('Nombre'),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('URL Amigable'),
                Textarea::make('description')
                    ->required()
                    ->label('Descripción')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Precio'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->live()
                    ->label('Categoría'),
                Select::make('subcategory_id')
                    ->relationship('subcategory', 'name')
                    ->required()
                    ->label('Subcategoría'),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required()
                    ->label('Marca'),
                TextInput::make('meta_title')
                    ->label('Meta Título'),
                TextInput::make('meta_description')
                    ->label('Meta Descripción'),
                TextInput::make('meta_keywords')
                    ->label('Meta Keywords'),
                Toggle::make('status')
                    ->label('Activo')
                    ->default(true),
                Repeater::make('images')
                    ->relationship()
                    ->schema([
                        FileUpload::make('path')
                            ->image()
                            ->directory('products')
                            ->required()
                            ->label('Imagen')
                            ->imagePreviewHeight('250')
                            ->imageEditor()
                            ->openable()
                            ->downloadable(),
                        TextInput::make('name')
                            ->required()
                            ->label('Nombre de la imagen'),
                    ])
                    ->label('Imágenes del Producto')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable()
                    ->label('Precio'),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->label('Categoría'),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->searchable()
                    ->sortable()
                    ->label('Subcategoría'),
                Tables\Columns\TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable()
                    ->label('Marca'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->label('Estado'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Categoría'),
                Tables\Filters\SelectFilter::make('brand')
                    ->relationship('brand', 'name')
                    ->label('Marca'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}