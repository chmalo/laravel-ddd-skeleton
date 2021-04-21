interface defaultCatalog {
    id: string,
    title: string
}

export interface Catalog {
    clientCategories: defaultCatalog[]
    clientTypes: defaultCatalog[]
}
